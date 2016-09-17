<?php

use Illuminate\Database\Seeder;

use App\CustomerTag;
use App\Customer;

class CustomerTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CustomerTag::truncate();

        $customers = Customer::count();

        for ($i=0; $i < $customers; $i++) {
            factory(CustomerTag::class, 3)->create();
        }
    }
}