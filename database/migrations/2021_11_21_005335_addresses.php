<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Addresses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id')->startingValue(1);
            $table->string('name');
            $table->string('surname');
            $table->string('city');
            $table->string('street');
            $table->string('house_number');
            $table->string('state');
            $table->string('zip');
            $table->string('phone');
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
