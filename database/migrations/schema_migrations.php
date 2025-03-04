<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create("institutes", function (Blueprint $table) {
            $table->id();
            $table->string("institute_name", 100)->unique();
            $table->timestamps();
        });

        // Programs Table
        Schema::create("programs", function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId("institute_id")
                ->constrained("institutes")
                ->onDelete("cascade");
            $table->string("name")->unique();
            $table->enum("status", ["active", "inactive"])->default("active");
            $table->boolean("delete_flag")->default(false);
            $table->timestamp("date_created")->nullable();
            $table->timestamp("date_updated")->nullable();
        });

        Schema::create("systems", function (Blueprint $table) {
            $table->id();
            $table->string("name")->unique();
            $table->timestamps();
        });

        Schema::create("roles", function (Blueprint $table) {
            $table->id();
            $table
                ->enum("role", [
                    "super_admin",
                    "institute_super_admin",
                    "institute_officer_admin",
                ])
                ->default("institute_officer_admin")
                ->unique();
            $table->text("description")->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        // Users Table
        Schema::create("users", function (Blueprint $table) {
            $table->id();
            $table->integer("session_id")->nullable();
            $table->string("user_name")->unique();
            $table->string("email")->unique();
            $table->timestamp("email_verified_at")->nullable();
            $table->string("password");
            $table->string("salt");
            $table->string("avatar")->nullable();
            $table->string("provider")->default("email");
            $table
                ->foreignId("institute_id")
                ->nullable()
                ->constrained("institutes")
                ->onDelete("cascade"); // NULL if super-admin
            $table
                ->enum("status", ["active", "deactivated"])
                ->default("active");
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create("admin_roles", function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId("user_id")
                ->constrained("users")
                ->onDelete("cascade");
            $table
                ->foreignId("role_id")
                ->constrained("roles")
                ->onDelete("cascade");
            $table
                ->foreignId("system_id")
                ->nullable()
                ->constrained("systems")
                ->onDelete("cascade");
            $table->softDeletes();
            $table->timestamps();

            // $table->unique(
            //     ["institute_id", "role_id"],
            //     "unique_institute_super_admin"
            // ); // Only 1 institute_super_admin per institute

            // ambot ani oi di naku ma unique ang role_id = 1 AHAHAHHAH bahala naning dnsc suoer admin oi cheeeee

            // $table->unique(['role_id'], 'unique_super_admin'); // Only 1 Super Admin

            // $table->unique(['role_id'], 'unique_super_admin')->where('role_id', 1); //// Only 1 Super Admin

            // $table
            //     ->unique(["role_id"], "unique_super_admin")
            //     ->whereNull(["institute_id"])->whereNull('system_id'); // Only 1 Super Admin
        });

        // Students Table
        Schema::create("students", function (Blueprint $table) {
            $table->id();
            $table->string("school_id")->unique();
            $table->foreignId("program_id")->constrained("programs");
            $table->string("rfid")->nullable()->unique();
            $table->string("first_name");
            $table->string("middle_name")->nullable();
            $table->string("last_name");
            $table->string("email")->unique();
            $table->string("set");
            $table->integer("year");
            $table
                ->enum("status", ["active", "inactive", "graduated", "leave"])
                ->default("active");
            $table->boolean("delete_flag")->default(false);
            $table->timestamps();
        });

        // Sessions Table
        // Schema::create("sessions", function (Blueprint $table) {
        //     $table->id();
        //     $table
        //         ->foreignId("user_id")
        //         ->constrained("users")
        //         ->onDelete("cascade");
        //     $table->string("token")->unique();
        //     $table->string("ip_address");
        //     $table->timestamp("expires_at");
        //     $table->timestamps();
        // });

        Schema::create("sessions", function (Blueprint $table) {
            $table->string("id")->primary();
            $table->foreignId("user_id")->nullable()->index();
            $table->string("ip_address", 45)->nullable();
            $table->text("user_agent")->nullable();
            $table->longText("payload");
            $table->integer("last_activity")->index();
        });

        Schema::create("collection_categories", function (Blueprint $table) {
            $table->id();
            $table->string("category_name", 50)->unique();
            $table->text("description")->nullable();
            $table->timestamps();
        });

        Schema::create("fees", function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId("student_id")
                ->constrained("students")
                ->onDelete("cascade");
            $table
                ->foreignId("category_id")
                ->nullable()
                ->constrained("collection_categories")
                ->onDelete("set null");
            $table
                ->foreignId("institute_id")
                ->constrained("institutes")
                ->onDelete("cascade");
            $table->decimal("total_amount", 5, 2);
            $table
                ->enum("status", ["pending", "paid", "waived"])
                ->default("pending");
            $table->foreignId("issued_by")->nullable()->constrained("users");
            $table->timestamp("issued_date")->useCurrent();
            $table->timestamp("due_date")->nullable();
            $table->timestamp("payment_date")->nullable();
            $table->text("remarks")->nullable();
            $table->timestamps();
        });

        // This table track submissions for payments made by students to cover fines
        Schema::create("payment_submissions", function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId("student_id")
                ->constrained("students")
                ->onDelete("cascade");
            $table
                ->foreignId("fees_id")
                ->constrained("fees")
                ->onDelete("cascade");
            $table->string("screenshot_path", 255);
            $table->timestamp("submitted_at")->useCurrent();
            $table
                ->enum("status", ["pending", "approved", "rejected"])
                ->default("pending");
            $table
                ->foreignId("reviewed_by")
                ->nullable()
                ->constrained("users")
                ->onDelete("cascade");
            $table->timestamp("reviewed_at")->nullable();
            $table->text("remarks")->nullable();
            $table->timestamps();
        });

        // Tracks actual payments made to an institution
        Schema::create("payments", function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId("fees_id")
                ->constrained("fees")
                ->onDelete("cascade");
            $table
                ->foreignId("institute_id")
                ->constrained()
                ->onDelete("cascade");
            $table->decimal("amount_paid", 5, 2);
            $table->timestamp("payment_date")->useCurrent();
            $table->enum("payment_method", ["gcash", "cash"])->default("cash");
            $table->foreignId("received_by")->nullable()->constrained("users");
            // $table->string('receipt_no', 50)->nullable();
            $table->timestamps();
        });

        // This table tracks the management of the collection process for unpaid fines.
        /* basi mangutana mo nga pwede ramana e track sa payment_submissions and payments. I dont know pero:
            - payment_submissions. naa raman gud dri is yung mga online submission lang po.
            - payments. wala poi pending^2 here
        */

        Schema::create("collection_management", function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId("fees_id")
                ->constrained("fees")
                ->onDelete("cascade");
            $table
                ->enum("collection_status", [
                    "pending",
                    "in progress",
                    "resolved",
                ])
                ->default("pending");
            $table->foreignId("assigned_to")->nullable()->constrained("users");
            $table->timestamp("collection_date")->useCurrent();
            $table->timestamp("last_contact_date")->nullable();
            $table->text("remarks")->nullable();
            $table->timestamps();
        });

        Schema::create("notifications", function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained()->onDelete("cascade");
            $table->text("message");
            $table->enum("status", ["unread", "read"])->default("unread");
            $table->timestamps();
        });

        Schema::create("attendance_events", function (Blueprint $table) {
            $table->id();
            $table->string("event_name");
            $table->date("start_date");
            $table->date("end_date");
            $table->timestamps();
        });

        Schema::create("attendance_records", function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId("student_id")
                ->constrained("students")
                ->onDelete("cascade");
            $table
                ->foreignId("attendance_event_id")
                ->constrained()
                ->onDelete("cascade");
            $table->date("date");
            $table->timestamp("morning_check_in")->nullable();
            $table->timestamp("morning_check_out")->nullable();
            $table->timestamp("afternoon_check_in")->nullable();
            $table->timestamp("afternoon_check_out")->nullable();
            $table->timestamps();
        });

        Schema::create("attendance_fees", function (Blueprint $table) {
            $table->id();
            // para tanang fines ma isa ra og kuha if need (for detailed view)
            $table
                ->foreignId("fee_id")
                ->nullable()
                ->constrained("fees")
                ->onDelete("cascade");
            // need ni para ma kuha natu ang event name (for groupings each event) tas makita natu if naa silay absent that day
            $table
                ->foreignId("attendance_record_id")
                ->constrained("attendance_records")
                ->onDelete("cascade");
            $table->decimal("amount", 5, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("admin_roles");
        Schema::dropIfExists("attendance_events");
        Schema::dropIfExists("attendance_fees");
        Schema::dropIfExists("attendance_records");
        Schema::dropIfExists("collection_categories");
        Schema::dropIfExists("collection_management");
        Schema::dropIfExists("fees");
        Schema::dropIfExists("institutes");
        Schema::dropIfExists("notifications");
        Schema::dropIfExists("payments");
        Schema::dropIfExists("payment_submissions");
        Schema::dropIfExists("programs");
        Schema::dropIfExists("roles");
        Schema::dropIfExists("sessions");
        Schema::dropIfExists("students");
        Schema::dropIfExists("systems");
        Schema::dropIfExists("users");
    }
};
