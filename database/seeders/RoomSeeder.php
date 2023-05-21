<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Room;


class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //property_id 1 has two rooms
        Room::create([
            'property_id' => 1,
            'room_name' => 'Master Suite',
            'number_of_beds' => 1,
            'room_rent' => 200,
            'min_stay' => 1,
            'max_stay' => 7,
            'image_path' => 'image1.jpg',
        ]);

        Room::create([
            'property_id' => 1,
            'room_name' => 'Cozy Bedroom',
            'number_of_beds' => 2,
            'room_rent' => 150,
            'min_stay' => 2,
            'max_stay' => 14,
            'image_path' => 'image2.jpg',
        ]);

        //property_id 2 also has two rooms
        Room::create([
            'property_id' => 2,
            'room_name' => 'Ocean View Suite',
            'number_of_beds' => 1,
            'room_rent' => 250,
            'min_stay' => 1,
            'max_stay' => 7,
            'image_path' => 'image3.jpg',
        ]);

        Room::create([
            'property_id' => 2,
            'room_name' => 'Family Room',
            'number_of_beds' => 3,
            'room_rent' => 180,
            'min_stay' => 2,
            'max_stay' => 14,
            'image_path' => 'image4.jpg',
        ]);

        // Assuming property_id 3 also has two rooms
        Room::create([
            'property_id' => 3,
            'room_name' => 'Deluxe Suite',
            'number_of_beds' => 1,
            'room_rent' => 300,
            'min_stay' => 1,
            'max_stay' => 7,
            'image_path' => 'image5.jpg',
        ]);

        Room::create([
            'property_id' => 3,
            'room_name' => 'Executive Suite',
            'number_of_beds' => 2,
            'room_rent' => 220,
            'min_stay' => 2,
            'max_stay' => 14,
            'image_path' => 'image6.jpg',
        ]);

        // Assuming property_id 4 also has two rooms
        Room::create([
            'property_id' => 4,
            'room_name' => 'Standard Room',
            'number_of_beds' => 1,
            'room_rent' => 150,
            'min_stay' => 1,
            'max_stay' => 7,
            'image_path' => 'image7.jpg',
        ]);

        Room::create([
            'property_id' => 4,
            'room_name' => 'Family Suite',
            'number_of_beds' => 4,
            'room_rent' => 280,
            'min_stay' => 2,
            'max_stay' => 14,
            'image_path' => 'image8.jpg',
        ]);
    }
}
