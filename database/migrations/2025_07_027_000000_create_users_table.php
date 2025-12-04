<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            // Primary key UUID (String)
            $table->string('id')->primary();
            
            // Foreign Key Role
            $table->unsignedInteger('id_role');
            
            // Data User
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('gender')->nullable();
            
            // Data Tambahan
            $table->unsignedBigInteger('NISN')->nullable();
            $table->string('number')->nullable();
            $table->text('address')->nullable();
            $table->unsignedBigInteger('NIK')->nullable();
            $table->string('photo')->nullable();
            
            $table->timestamps();
            $table->softDeletes(); 

            // Definisi Foreign Key
            $table->foreign('id_role')->references('id_role')->on('roles')->cascadeOnDelete();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            
            // Gunakan string karena User ID adalah UUID, bukan Integer.
            // Jangan gunakan foreignId() bawaan.
            // Gitu ya kurang lebih...
            $table->string('user_id')->nullable()->index();
            
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};