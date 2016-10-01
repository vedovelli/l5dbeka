<?php

use Illuminate\Database\Seeder;

use App\Customer;
use App\Address;
use App\Telephone;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Customer::class, 20)->create()->each(function ($customer) {
            $address = factory(Address::class)->make();
            $customer->address()->save($address);

            for ($i=0; $i < 3; $i++) {
                $telephone = factory(Telephone::class)->make();
                $customer->telephones()->save($telephone);
            }
        });
    }
}







