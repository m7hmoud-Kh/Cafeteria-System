<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i=0; $i < 40; $i++) {
            Tag::create([
                'name' => $faker->unique()->name(),
            ]);
        }
    }
}
