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
        Schema::create('inventory', function (Blueprint $table) {
            $table->id('id_list');
            $table->uuid('user_id');
            $table->unsignedBigInteger('bc_id');
            $table->boolean('is_fav')->default(false);
            $table->unsignedBigInteger('borrow_id')->nullable();
            $table->unsignedBigInteger('return_id')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('bc_id')->references('id_bc')->on('book_children')->cascadeOnDelete();
            $table->foreign('borrow_id')->references('id_borrow')->on('borrows')->nullOnDelete();
            $table->foreign('return_id')->references('id_return')->on('returns')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
