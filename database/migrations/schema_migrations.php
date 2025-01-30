<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Users Table
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('session_id')->nullable();
            $table->string('user_name')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('salt');
            $table->string('gcash_number')->nullable();
            $table->string('avatar')->nullable();
            $table->string('provider')->default('emailPassword');
            $table->enum('role', ['admin', 'user'])->default('user');
            $table->timestamps();
        });

        // Programs Table
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->boolean('delete_flag')->default(false);
            $table->timestamp('date_created')->nullable();
            $table->timestamp('date_updated')->nullable();
        });

        // Students Table
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('school_id')->unique();
            $table->foreignId('program_id')->constrained('programs');
            $table->string('rfid')->nullable();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('email');
            $table->string('set');
            $table->integer('year');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->boolean('delete_flag')->default(false);
            $table->timestamps();
        });

        // Sessions Table
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('token')->unique();
            $table->string('ip_address');
            $table->timestamp('expires_at');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('students');
        Schema::dropIfExists('programs');
        Schema::dropIfExists('users');
    }
};
