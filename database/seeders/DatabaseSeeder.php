<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password123'),
            'role'=>'admin',
            'no_hp'=>'082344448888',
            'alamat'=>'jl.intisari'
        ]);

        User::create([
            'name' => 'Akbar',
            'email' => 'akbar@gmail.com',
            'password' => Hash::make('1234560'),
            'role'=>'user',
            'no_hp'=>'082371096727',
            'alamat'=>'jl.tegalsari'
        ]);

        User::create([
            'name' => 'Daffa',
            'email' => 'dapa@gmail.com',
            'password' => Hash::make('1234560'),
            'role'=>'user',
            'no_hp'=>'082371096727',
            'alamat'=>'jl.tegalsari'
        ]);
    }
}
