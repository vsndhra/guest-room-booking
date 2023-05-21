<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // owner_id 1 has two properties
        Property::create([
            'owner_id' => 1,
            'property_name' => 'Luxury Villa',
            'property_address' => '123 Main Street',
        ]);

        Property::create([
            'owner_id' => 1,
            'property_name' => 'Cozy Cottage',
            'property_address' => '456 Elm Street',
        ]);

        // owner_id 2 also has two properties
        Property::create([
            'owner_id' => 2,
            'property_name' => 'Seaside Retreat',
            'property_address' => '789 Beach Road',
        ]);

        Property::create([
            'owner_id' => 2,
            'property_name' => 'Mountain Chalet',
            'property_address' => '321 Summit Avenue',
        ]);
    }
}
