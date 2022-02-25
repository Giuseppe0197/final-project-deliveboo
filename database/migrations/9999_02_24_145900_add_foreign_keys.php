<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // relazione clienti ordini
        Schema::table('clients', function (Blueprint $table) {
            $table->foreign('order_id', 'client_order')->references('id')->on('orders');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('client_id', 'order_client')->references('id')->on('clients');
        });

        // relazione ordini piatti
        Schema::table('dish_order', function (Blueprint $table) {
            $table->foreign('dish_id', 'dishes_orders')->references('id')->on('dishes');
            $table->foreign('order_id', 'orders_dishes')->references('id')->on('orders');
        });

        // relazione dishes 
        Schema::table('dishes', function (Blueprint $table) {
            $table->foreign('restaurant_id', 'dishes_restaurant')->references('id')->on('restaurants');
        });

        // relazione ristoranti categorie
        Schema::table('category_restaurant', function (Blueprint $table) {
            $table->foreign('category_id', 'categories_restaurants')->references('id')->on('categories');
            $table->foreign('restaurant_id', 'restaurants_categories')->references('id')->on('restaurants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('clients', function (Blueprint $table) {
        //     $table -> dropForeign('client_order');
        // });

        // Schema::table('orders', function (Blueprint $table) {
        //     $table->dropForeign('order_client');
        // });

        // Schema::table('dish_order', function (Blueprint $table) {
        //     $table->dropForeign('dishes_orders');
        //     $table->dropForeign('orders_dishes');
        // });

        // Schema::table('dishes', function (Blueprint $table) {
        //     $table->dropForeign('dishes_restaurant');
        // });

        // Schema::table('category_restaurant', function (Blueprint $table) {
        //     $table->dropForeign('categories_restaurants');
        //     $table->dropForeign('restaurants_categories');
        // });
    }
}
