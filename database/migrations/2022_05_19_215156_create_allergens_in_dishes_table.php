<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allergens_in_dishes', function (Blueprint $table) {
            $table->unsignedBigInteger('allergen_id');
            $table->foreign('allergen_id')->references('id')->on('allergens');
            $table->unsignedBigInteger('dish_id');
            $table->foreign('dish_id')->references('id')->on('dishes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('allergens_in_dishes');
    }
};
