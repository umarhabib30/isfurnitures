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
        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('seatnumber_id')->nullable();
            $table->foreign('seatnumber_id')->references('id')->on('seats')->onDelete('cascade');
            $table->foreignId('stuff_id')->nullable();
            $table->foreign('stuff_id')->references('id')->on('stuffs')->onDelete('cascade');
            $table->string('size')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
