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
        Schema::create('inventories', function (Blueprint $table) {
            $table->increments('id_list');
            $table->string('user_id')->nullable();
            $table->unsignedInteger('bc_id')->nullable();
            $table->boolean('is_fav')->default(false);
            $table->unsignedInteger('borrow_id')->nullable();
            $table->unsignedInteger('return_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('bc_id')->references('id_bc')->on('book_children')->cascadeOnDelete();
            $table->foreign('borrow_id')->references('id_borrow')->on('borrow')->nullOnDelete();
            $table->foreign('return_id')->references('id_return')->on('return')->nullOnDelete();
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
