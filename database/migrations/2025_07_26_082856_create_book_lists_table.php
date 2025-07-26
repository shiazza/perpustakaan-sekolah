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
            $table->uuid('user_id');
            $table->unsignedBigInteger('bc_id');
            $table->unsignedBigInteger('id_trans');
            $table->enum('is_favorite', ['yes', 'no'])->default('no');
            $table->timestamp('borrow_duration_start')->nullable();
            $table->timestamp('borrow_duration_end')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('bc_id')->references('id_bc')->on('book_child')->cascadeOnDelete();
            $table->foreign('id_trans')->references('id_trans')->on('transaction')->cascadeOnDelete();
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
