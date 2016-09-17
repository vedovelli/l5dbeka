<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeFkFromExampleIdToCustomerIdOnTelephones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('pgsql')->table('telephones', function (Blueprint $table) {
            $table->renameColumn('example_id', 'customer_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('pgsql')->table('telephones', function (Blueprint $table) {
            $table->renameColumn('customer_id', 'example_id');
        });
    }
}
