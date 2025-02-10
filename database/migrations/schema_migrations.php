<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create("institutes", function (Blueprint $table) {
            $table->id();
            $table->string("institute_name", 100);
            $table->timestamps();
        });

        // Programs Table
        Schema::create("programs", function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId("institute_id")
                ->constrained("institutes")
                ->onDelete("cascade");
            $table->string("name");
            $table->enum("status", ["active", "inactive"])->default("active");
            $table->boolean("delete_flag")->default(false);
            $table->timestamp("date_created")->nullable();
            $table->timestamp("date_updated")->nullable();
        });

        // Users Table
        Schema::create("users", function (Blueprint $table) {
            $table->id();
            $table->integer("session_id")->nullable();
            $table->string("user_name")->unique();
            $table->string("email")->unique();
            $table->string("password");
            $table->string("salt");
            $table->string("gcash_number")->nullable();
            $table->string("avatar")->nullable();
            $table->string("provider")->default("emailPassword");
            $table
                ->enum("role", [
                    "super_admin",
                    "collection_officer",
                    "institute_admin",
                    "user",
                ])
                ->default("user"); // user jud ba default? i thought mga admin staff lang man here? gi apil ang institute for future purposes
            $table->timestamps();
        });

        // Students Table
        Schema::create("students", function (Blueprint $table) {
            $table->id();
            // $table
            //     ->foreignId("user_id")
            //     ->constrained("users")
            //     ->onDelete("cascade");
            // ayu, need jud ning foreign_key sa user id?
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
                ->enum("status", ["active", "inactive", "graduated"])
                ->default("active");
            $table->boolean("delete_flag")->default(false);
            $table->timestamps();
        });

        // Sessions Table
        Schema::create("sessions", function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId("user_id")
                ->constrained("users")
                ->onDelete("cascade");
            $table->string("token")->unique();
            $table->string("ip_address");
            $table->timestamp("expires_at");
            $table->timestamps();
        });

        Schema::create("collection_categories", function (Blueprint $table) {
            $table->id();
            $table->string("category_name", 50);
            $table->decimal("fee", 4, 2);
            $table->text("description")->nullable();
            $table->timestamps();
        });

        Schema::create("fines", function (Blueprint $table) {
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
            $table->decimal("amount", 5, 2);
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
                ->foreignId("fine_id")
                ->constrained("fines")
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
                ->foreignId("fine_id")
                ->constrained("fines")
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
                ->foreignId("fine_id")
                ->constrained("fines")
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

        // Schema::create('notifications', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('user_id')->constrained()->onDelete('cascade');
        //     $table->text('message');
        //     $table->enum('status', ['unread', 'read'])->default('unread');
        //     $table->timestamp('created_at')->useCurrent();
        //     $table->timestamps();
        // });
    }

    public function down(): void
    {
        Schema::dropIfExists("institutes");
        Schema::dropIfExists("programs");
        Schema::dropIfExists("users");
        Schema::dropIfExists("students");
        Schema::dropIfExists("sessions");
        Schema::dropIfExists("collection_categories");
        Schema::dropIfExists("fines");
        Schema::dropIfExists("payment_submissions");
        Schema::dropIfExists("payments");
        Schema::dropIfExists("collection_management");
        // Schema::dropIfExists("notifications");
    }
};
