<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();

            $table -> string('owner_name', 60);
            $table -> string('restaurant_name', 60);
            $table -> string('restaurant_phone', 20) -> unique();
            $table -> string('email') -> unique();
            $table -> string('password');
            $table -> string('address');
            $table -> string('image');
            $table -> string('p_iva', 20) -> unique();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurants');
    }
}
