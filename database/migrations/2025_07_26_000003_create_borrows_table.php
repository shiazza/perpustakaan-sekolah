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
        Schema::create('borrow', function (Blueprint $table) {
            $table->increments('id_borrow');
            $table->timestamp('borrow_duration_start')->nullable();
            $table->timestamp('borrow_duration_end')->nullable();
            $table->timestamp('date')->useCurrent();
            $table->enum('status', ['pending','active','completed'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrows');
    }
};
