<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Guest;

class GuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Guest::create([
            'guest_name' => 'Sarah Johnson',
            'guest_email' => 'sarah@example.com',
            'guest_phone' => '1234567890',
            'guest_password' => bcrypt('password'),
        ]);
        
        Guest::create([
            'guest_name' => 'Michael Smith',
            'guest_email' => 'michael@example.com',
            'guest_phone' => '9876543210',
            'guest_password' => bcrypt('password'),
        ]);
    }
}
