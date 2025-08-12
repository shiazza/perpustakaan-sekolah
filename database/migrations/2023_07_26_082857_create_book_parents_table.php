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
        Schema::create('book_parents', function (Blueprint $table) {
            $table->id('id_bp');
            $table->string('title');
            $table->string('writers');
            $table->text('sinopsis')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->string('image')->nullable();
            $table->string('publisher')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('category_id')->references('id_cate')->on('categories')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_parents');
    }
};
