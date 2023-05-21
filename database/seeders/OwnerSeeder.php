<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Owner::create([
            'owner_name' => 'John Doe',
            'owner_email' => 'john@example.com',
            'owner_phone' => '1234567890',
            'owner_password' => bcrypt('password'),
        ]);
        
        Owner::create([
            'owner_name' => 'Jane Smith',
            'owner_email' => 'jane@example.com',
            'owner_phone' => '9876543210',
            'owner_password' => bcrypt('password'),
        ]);
    }
}
