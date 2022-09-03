<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //create Dummy Admin
        $faker = Factory::create();
        for ($i=0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name(),
                'email' => $faker->unique->safeEmail(),
                'password' => Hash::make('123456'),
                'isAdmin' => 1,
                'image' => rand(1,6).'.jpg',
                'email_verified_at' => now()
            ]);
        }
    }
}
