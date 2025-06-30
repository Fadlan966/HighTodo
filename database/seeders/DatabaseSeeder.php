<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => 'Admin',
            'password' => Hash::make('admin123'),
            'is_tasks' => false,
        ]);
        User::create([
            'name' => 'John',
            'email' => 'john@gmail.com',
            'role' => 'Employee',
            'password' => Hash::make('123123123'),
            'is_tasks' => false,
        ]);
        User::create([
            'name' => 'Devi',
            'email' => 'devin@gmail.com',
            'role' => 'Employee',
            'password' => Hash::make('123123123'),
            'is_tasks' => false,
        ]);
        User::create([
            'name' => 'Budi',
            'email' => 'budi@gmail.com',
            'role' => 'Employee',
            'password' => Hash::make('123123123'),
            'is_tasks' => false,
        ]);
    }
}
