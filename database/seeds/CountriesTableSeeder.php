<?php

use Illuminate\Database\Seeder;
use App\Country;
use App\Customer;

class CountriesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = \App::make(Faker\Generator::class);

        factory(Country::class, 10)->create();

        $customers = Customer::all();

        foreach ($customers as $customer) {
            $customer->country_id = $faker->numberBetween(1, 10);
            $customer->save();
        }
    }
}
