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
        // relazione ordini piatti
        Schema::table('dish_order', function (Blueprint $table) {
            $table->foreign('dish_id', 'dishes_orders')->references('id')->on('dishes');
            $table->foreign('order_id', 'orders_dishes')->references('id')->on('orders');
        });

        // relazione dishes 
        Schema::table('dishes', function (Blueprint $table) {
            $table->foreign('user_id', 'dishes_user')->references('id')->on('users');
        });

        // relazione ristoranti categorie
        Schema::table('category_user', function (Blueprint $table) {
            $table->foreign('category_id', 'categories_users')->references('id')->on('categories');
            $table->foreign('user_id', 'users_categories')->references('id')->on('users');
        });

        // relazione ordini clienti
        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('client_id', 'client_order')->references('id')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dish_order', function (Blueprint $table) {
            $table->dropForeign('dishes_orders');
            $table->dropForeign('orders_dishes');
        });

        Schema::table('dishes', function (Blueprint $table) {
            $table->dropForeign('dishes_user');
        });

        Schema::table('category_user', function (Blueprint $table) {
            $table->dropForeign('categories_users');
            $table->dropForeign('users_categories');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('client_order');
        });
    }
}
