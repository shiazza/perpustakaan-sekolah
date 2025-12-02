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
        Schema::create('return_transactions', function (Blueprint $table) {
            $table->id('id_return');
            $table->unsignedInteger('borrow_id');
            $table->unsignedInteger('bc_id');
            $table->date('date');
            $table->enum('condition', ['good', 'damaged', 'lost']);
            $table->integer('fine_value')->nullable();
            $table->enum('fine_status', ['paid', 'unpaid'])->nullable();
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('borrow_id')->references('id_borrow')->on('borrows')->cascadeOnDelete();
            $table->foreign('bc_id')->references('id_bc')->on('book_children')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('return_transactions');
    }
};
