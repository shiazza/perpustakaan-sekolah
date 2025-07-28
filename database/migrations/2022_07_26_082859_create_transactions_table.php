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
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id_trans');
            $table->unsignedBigInteger('borrow_id');
            $table->unsignedBigInteger('return_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('borrow_id')->references('id_borrow')->on('borrows')->cascadeOnDelete();
            $table->foreign('return_id')->references('id_return')->on('return_books')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
