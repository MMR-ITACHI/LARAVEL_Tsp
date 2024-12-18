<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        \App\Models\Specialist::factory(100)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // \App\Models\Admin::create([
        //     'name' => 'Admin Hossain',
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make('admin123')
        // ]);


        // \App\Models\Doctor::create([
        //     'name' => 'Doctor Hossain',
        //     'email' => 'doctor@gmail.com',
        //     'password' => Hash::make('admin123')
        // ]);
    }
}
