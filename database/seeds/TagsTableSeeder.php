<?php

use Illuminate\Database\Seeder;

use App\Tag;
use App\Address;
use App\Telephone;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::truncate();

        $tags = ['Bom pagador', 'Gentil', 'Reclamão', 'Sovina', 'Boa palavra'];

        foreach ($tags as $tag) {
            Tag::create(['name' => $tag]);
        }
    }
}