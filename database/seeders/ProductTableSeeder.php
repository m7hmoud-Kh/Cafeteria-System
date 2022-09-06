<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Tag;
use App\Models\Product;
use App\Models\Category;
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
        $tags = Tag::pluck('id');
        for ($i = 0; $i < 150; $i++) {
            $product =   Product::create([
                'name' => $faker->unique()->sentence(1),
                'price' => $faker->numberBetween(1, 50),
                'size' => $faker->numberBetween(1, 3),
                'quantity' => $faker->numberBetween(5, 100),
                'image' => 'Produt.jpg',
                'category_id' => $categories->random(),
                'status' => rand(1, 0)
            ]);
            $product->tags()->sync($tags->random());
        }
    }
}
