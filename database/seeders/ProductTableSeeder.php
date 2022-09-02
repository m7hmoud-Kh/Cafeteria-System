<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $categories = Category::pluck('id');
        for ($i=0; $i < 100 ; $i++) {
            Product::create([
                'name' => $faker->unique()->name(),
                'price' => $faker->numberBetween(1,50),
                'size' => $faker->numberBetween(1,3),
                'quantity' => $faker->numberBetween(5, 100),
                'image' => 'Tea new.jpg',
                'category_id' => $categories->random(),
                'status' => rand(1,0)
            ]);
        }

    }
}
