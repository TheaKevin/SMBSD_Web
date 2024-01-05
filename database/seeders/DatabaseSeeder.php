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
        //     'loginID' => 'adminProd',
        //     'password' => Hash::make('SmbSuvannaDipaAdmin123!'),
        //     'role' => 'admin'
        // ]);

        \App\Models\User::factory()->create([
            'fullName' => 'Super Admin User',
            'loginID' => 'superAdminProd',
            'password' => Hash::make('SmbSuvannaDipaSuperAdmin123!'),
            'role' => 'super admin'
        ]);

        \App\Models\User::factory()->create([
            'fullName' => 'Thea Kevin Hartono',
            'loginID' => 'DecKev08',
            'password' => Hash::make('SmbSuvannaDipaSuperAdmin123!'),
            'role' => 'super admin'
        ]);

        // \App\Models\User::factory()->create([
        //     'fullName' => 'Garlan Wijaya',
        //     'loginID' => '1234567890',
        //     'password' => Hash::make('1234567890'),
        // ]);
    }
}
