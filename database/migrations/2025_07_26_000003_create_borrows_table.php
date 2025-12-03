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
        Schema::create('borrows', function (Blueprint $table) {
            $table->increments('id_borrow');
            $table->uuid('user_id');
            $table->unsignedInteger('bc_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', ['active', 'completed', 'overdue', 'cancelled'])->default('active');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('bc_id')->references('id_bc')->on('book_children')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrows');
    }
};
