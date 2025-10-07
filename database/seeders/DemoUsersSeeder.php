<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DemoUsersSeeder extends Seeder
{
    public function run(): void
    {
         User::firstOrCreate(
            ['email' => 'super@demo.com'],
            ['name' => 'Super Admin', 'password' => Hash::make('password'), 'role' => 'superadmin']
        );
        User::firstOrCreate(
      ['email' => 'admin@demo.com'],
      ['name' => 'Admin','password' => Hash::make('password'),'role' => 'admin']
    );
    }
}
