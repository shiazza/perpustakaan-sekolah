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
        Schema::create('book_children', function (Blueprint $table) {
            $table->increments('id_bc');
            $table->unsignedInteger('bp_id'); // sesuai ERD nama bp_id
            $table->string('ISBN');
            $table->string('Condition')->nullable();
            $table->enum('status', ['available','borrowed','lost','damaged'])->default('available');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('bp_id')->references('id_bp')->on('book_parents')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_children');
    }
};
