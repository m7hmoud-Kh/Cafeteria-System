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
        $role = [1, Null];
        $faker = Factory::create();
        for ($i = 0; $i < 4; $i++) {
            User::create([
                'name' => $faker->name(),
                'email' => $faker->unique->safeEmail(),
                'password' => Hash::make('123456'),
                'isAdmin' => $role[rand(0, 1)],
                'image' => rand(1, 4) . '.jpg',
                'email_verified_at' => now()
            ]);
        }
    }
}
