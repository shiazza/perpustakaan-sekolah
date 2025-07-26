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
        Schema::create('book_lists', function (Blueprint $table) {
            $table->bigIncrements('id_list');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('bc_id');
            $table->unsignedBigInteger('id_trans')->nullable(); // asumsi: ke tabel transactions
            $table->enum('is_favorite', ['yes', 'no'])->default('no');
            $table->timestamp('borrow_duration_start')->nullable();
            $table->timestamp('borrow_duration_end')->nullable();
            $table->timestamps();

            $table->foreign('bc_id')->references('id_bc')->on('book_child')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_lists');
    }
};
