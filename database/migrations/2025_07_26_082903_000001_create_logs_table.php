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
        Schema::create('logs', function (Blueprint $table) {
            $table->increments('id_log');
            $table->unsignedInteger('log_msg')->nullable();
            $table->unsignedInteger('log_return')->nullable();
            $table->unsignedInteger('log_borrow')->nullable();
            $table->unsignedInteger('log_books')->nullable();
            $table->string('action')->nullable();
            $table->string('user_id');
            $table->timestamp('log_time')->useCurrent();
            $table->timestamps();

            $table->foreign('log_msg')->references('id_message')->on('message')->nullOnDelete();
            $table->foreign('log_return')->references('id_return')->on('return')->nullOnDelete();
            $table->foreign('log_borrow')->references('id_borrow')->on('borrow')->nullOnDelete();
            $table->foreign('log_books')->references('id_bc')->on('book_children')->nullOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logs');
    }
};
