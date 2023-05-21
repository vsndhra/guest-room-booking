<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\Guest;
use App\Models\Owner;
use App\Models\Property;
use App\Models\Room;
use App\Models\Booking;
use Session;

class MainController extends Controller
{
    public function listProperty(){

        $property = array();

        $data = Guest::where('id', '=', Session::get('loginId'))->first();
        $property = Property::all();
            
        //return compact('data', 'property');
        return view('guest.view.property', compact('data', 'property'));
    }

    public function viewProperty($id){

        $room = array();
          
        $data = Guest::where('id', '=', Session::get('loginId'))->first();
        $room = Room::where('property_id', '=', $id )->get();
        
        return view('guest.view.room', compact('data', 'room'));
        //return compact('data', 'room');

    }

    public function roomDetails($id){

        $data = Guest::where('id', '=', Session::get('loginId'))->first();
        $imagePath = Room::where('id','=',$id)->pluck('image_path')->first();
        
        return view('guest.view.details', compact('data', 'imagePath'));
    }

    public function book($id){

        $data = Guest::where('id', '=', Session::get('loginId'))->first();
        $details = Room::where('id', '=', $id)->first();

        //return compact('data', 'details');
        return view('guest.booking.book', compact('data', 'details'));

    }

    public function bookRoom($id, Request $request){

        $request->validate([
            'start_date'=>'required',
            'end_date'=>'required',
            'guest_name'=>'required|string',
            'property_name'=>'required|string',
            'room_type'=>'required|string',
            'room_rent'=>'required|numeric',
        ]);

        $booking = new Booking();

        $ownerId = Room::join('properties', 'rooms.property_id', '=', 'properties.id')
        ->join('owners', 'properties.owner_id', '=', 'owners.id')
        ->where('rooms.id', $id)
        ->value('owners.id');

        $startEnd = Carbon::parse($request->start_date);
        $endDate = Carbon::parse($request->end_date);

        $days = $startEnd->diffInDays($endDate) + 1;

        $booking->guest_id = Session::get('loginId');
        $booking->owner_id = $ownerId;
        $booking->room_id = $id;
        $booking->guest_name = $request->guest_name;
        $booking->property_name = $request->property_name;
        $booking->room_type = $request->room_type;
        $booking->amount_paid = $days*$request->room_rent;
        $booking->start_date = $request->start_date;
        $booking->end_date = $request->end_date;
        $result = $booking->save();

        if($result){
            return back()->with('Success', 'Room Booked Successfully');
        } else {
            return back()->with('Error', 'Something went wrong');
        }

        //return $days;

    }

    public function history($id){

        $data = Guest::where('id', '=', Session::get('loginId'))->first();
        $booking = Booking::where('guest_id', '=', $id)->get();
        
        //return compact('data', 'booking');
        return view('guest.booking.history', compact('data', 'booking'));
    }
}
