<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Muhammad Aprilianto Putra',
            'username'=> 'Putra',
            'email'=> 'apriliantoputra@gmail.com',
            'role'=> 'admin',
            'is_admin'=>true,
            'email_verified_at'=> now(),
            'password'=> Hash::make('password'),
            'remember_token'=> Str::random(10)
        ]);

        User::factory(3)->create();
    }
}
