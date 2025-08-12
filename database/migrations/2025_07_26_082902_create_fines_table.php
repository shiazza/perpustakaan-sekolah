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
        Schema::create('fines', function (Blueprint $table) {
            $table->id('id_fns');
            $table->unsignedBigInteger('borrow_id');
            $table->unsignedBigInteger('return_id');
            $table->integer('value');
            $table->string('damaged')->nullable();
            $table->string('lost')->nullable();
            $table->boolean('paid')->default(false);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('borrow_id')->references('id_borrow')->on('borrow')->cascadeOnDelete();
            $table->foreign('return_id')->references('id_return')->on('return')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fines');
    }
};
