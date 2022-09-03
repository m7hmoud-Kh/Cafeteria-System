<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CateogryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create Dummy Category
        $faker = Factory::create();
        for ($i=0; $i < 30; $i++) {
            Category::create([
                'name' => $faker->unique()->name(),
                'image' => rand(1,2).'.jpg'
            ]);
        }
    }
}
