<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('pgsql')->create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('example_id')->unsigned();
            $table->string('street');
            $table->string('street2');
            $table->string('number', 4);
            $table->string('neighborhood');
            $table->string('city', 100);
            $table->string('state', 2);
            $table->string('postal', 9);
            $table->string('country');
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
        Schema::connection('pgsql')->dropIfExists('addresses');
    }
}
