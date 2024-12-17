<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate([
            'email' => 'admin@ehb.be',
        ], [
            'name' => 'Admin',
            'password' => Hash::make('Password!321'),
            'isAdmin' => true,
        ]);
    }
}
