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
        for ($i = 0; $i < 25; $i++) {
            Category::create([
                'name' => $faker->unique()->sentence(1),
                'image' => '1.jpg'
            ]);
        }
    }
}
