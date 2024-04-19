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
        Schema::create('supplies', function (Blueprint $table) {
            $table->id('pk_supply');
            $table->char('cod_supply', 20);
            $table->string('name_supply', 60);
            $table->unsignedBigInteger('presentation')->default(0);
            $table->double('price', 22, 0);
            $table->double('price_per_gram', 22, 0);
            $table->unsignedBigInteger('amount')->default(0);
            $table->unsignedBigInteger('stock')->default(0);
            $table->date('due_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplies');
    }
};