<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id')->startingValue(1);
            $table->timestamps();
            $table->integer('delivery');
            $table->integer('payment');
            $table->float('price');
            $table->string('name');
            $table->string('surname');
            $table->string('city');
            $table->string('street');
            $table->string('house_number');
            $table->string('state');
            $table->string('zip');
            $table->string('phone');
            $table->integer('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
