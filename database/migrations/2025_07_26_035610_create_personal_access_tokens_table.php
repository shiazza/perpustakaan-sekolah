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
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->constrained('roles')->onDelete('cascade'); 
            $table->string('email');
            $table->string('name');
            $table->integer('nisn')->nullable();
            $table->integer('nik')->nullable();
            $table->string('address')->nullable(); 
            $table->integer('nomor')->nullable();
            $table->string('photo')->nullable(); 
            $table->enum('gender', ['laki-laki', 'perempuan']);
            $table->morphs('tokenable');
            $table->string('token', 64)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_access_tokens');
    }
};
