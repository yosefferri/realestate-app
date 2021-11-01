<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\Hash;


class AdminTableSeeder extends Seeder
{
    public function run()
    {
    $password = Hash::make('root');

    Admin::create([
        'name' => 'Administrator',
        'email' => 'admin@test.com',
        'password' => $password
        ]);
    }
}
