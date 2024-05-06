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
        Schema::create('products', function (Blueprint $table) {
            $table->id('pk_product');
            $table->char('cod_prod', 20);
            $table->string('name_prod', 60);
            $table->char('time', 4);
            $table->double('production_cost', 22, 0);
            $table->double('cost_of_workers', 22, 0);
            $table->double('bills', 22, 0);
            $table->timestamps();
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
