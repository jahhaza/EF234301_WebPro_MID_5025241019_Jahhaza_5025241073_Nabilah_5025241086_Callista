<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Create admin user
        User::create([
            'name' => 'NIKI Admin',
            'email' => 'admin@niki.com',
            'password' => Hash::make('password123'),
            'phone' => '+6281234567890',
            'is_admin' => true,
            'membership_status' => 'premium',
            'membership_plan' => 'yearly',
            'membership_expires_at' => now()->addYear(),
        ]);

        // Create regular user
        User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password123'),
            'phone' => '+6289876543210',
            'is_admin' => false,
            'membership_status' => 'free',
        ]);

        // Create premium user
        User::create([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'password' => Hash::make('password123'),
            'phone' => '+6281122334455',
            'is_admin' => false,
            'membership_status' => 'premium',
            'membership_plan' => 'monthly',
            'membership_expires_at' => now()->addMonth(),
        ]);
    }
}