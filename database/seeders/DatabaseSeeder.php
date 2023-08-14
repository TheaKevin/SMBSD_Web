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

        // \App\Models\User::factory()->create([
        //     'fullName' => 'Admin User',
        //     'loginID' => '1234567890',
        //     'password' => Hash::make('thea1234'),
        //     'role' => 'admin'
        // ]);

        \App\Models\User::factory()->create([
            'fullName' => 'Super Admin User',
            'loginID' => 'thea1234',
            'password' => Hash::make('thea1234'),
            'role' => 'super admin'
        ]);

        // \App\Models\User::factory()->create([
        //     'fullName' => 'Member User',
        //     'loginID' => '0987654321',
        //     'password' => Hash::make('thea1234'),
        // ]);
    }
}
