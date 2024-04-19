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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id('pk_recipe');
            $table->unsignedBigInteger('amount')->default(0);

            $table->unsignedBigInteger('fk_product');
            $table->foreign('fk_product')->references('pk_product')->on('products');

            $table->unsignedBigInteger('fk_supply');
            $table->foreign('fk_supply')->references('pk_supply')->on('supplies');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};