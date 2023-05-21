<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Booking;

use Carbon\Carbon;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $today = Carbon::now();

        // Booking for Property 1, Room 1
        Booking::create([
            'guest_id' => 1,
            'owner_id' => 1,
            'room_id' => 1,
            'guest_name' => 'Sarah Johnson',
            'property_name' => 'Luxury Villa',
            'room_type' => 'Master Suite',
            'amount_paid' => 400,
            'start_date' =>  $today->toDateString(),
            'end_date' => $today->addDays(5)->toDateString(),
        ]);

        // Booking for Property 1, Room 2
        Booking::create([
            'guest_id' => 1,
            'owner_id' => 1,
            'room_id' => 2,
            'guest_name' => 'Sarah Johnson',
            'property_name' => 'Luxury Villa',
            'room_type' => 'Cozy Bedroom',
            'amount_paid' => 600,
            'start_date' =>  $today->toDateString(),
            'end_date' => $today->addDays(1)->toDateString(),
        ]);

        // Booking for Property 2, Room 3
        Booking::create([
            'guest_id' => 2,
            'owner_id' => 2,
            'room_id' => 3,
            'guest_name' => 'Michael Smith',
            'property_name' => 'Cozy Cottage',
            'room_type' => 'Ocean View Suite',
            'amount_paid' => 800,
            'start_date' =>  $today->toDateString(),
            'end_date' => $today->addDays(2)->toDateString(),
        ]);

        // Booking for Property 2, Room 4
        Booking::create([
            'guest_id' => 2,
            'owner_id' => 2,
            'room_id' => 4,
            'guest_name' => 'Michael Smith',
            'property_name' => 'Cozy Cottage',
            'room_type' => 'Family Room',
            'amount_paid' => 1200,
            'start_date' =>  $today->toDateString(),
            'end_date' => $today->addDays(3)->toDateString(),
        ]);

    }
}
