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
        Schema::create('book_childrens', function (Blueprint $table) {
            $table->bigIncrements('id_bc');
            $table->unsignedBigInteger('bp_id'); // relasi ke book_parents
            $table->string('ISBN');              // pakai string, karena ISBN bisa mengandung leading zero & 13 digit
            $table->string('condition');
            $table->timestamps();

            $table->foreign('bp_id')->references('id_bp')->on('book_parents')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_childrens');
    }
};
