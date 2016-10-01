<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(CustomerTagTableSeeder::class);
    }
}
