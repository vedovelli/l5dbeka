<?php

use Illuminate\Database\Seeder;
use \App\Example;

class ExamplesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('pgsql')->table('examples')->truncate();
        factory(Example::class, 500)->create();
    }
}







