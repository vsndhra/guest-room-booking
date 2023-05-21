<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Owner;
use App\Models\Guest;
use App\Models\Property;
use App\Models\Room;
use App\Models\Booking;
use Session;

class RoomController extends Controller
{
    public function listRoom($id){
        
        $room = array();
        
        if(Session::has('loginId')){

            $data = Owner::where('id', '=', Session::get('loginId'))->first();
            $room = Room::where('property_id', '=', $id )->get();

        }
        
        return view('owner.room.list', compact('data', 'room'));
    }

    public function create(){

        $data = Owner::where('id', '=', Session::get('loginId'))->first();

        return view('owner.room.create', compact('data'));
    }

    public function createRoom(Request $request){

        $request->validate([
            'room_name'=>'required',
            'number_of_beds'=>'required',
            'room_rent'=>'required',
            'min_stay'=>'required',
            'max_stay'=>'required',
            'room_image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $room = new Room();

        $ownerId = Session::get('loginId');

        // Retrieve the id from the properties table based on the owner_id
        $propertyId = Property::where('owner_id', $ownerId)->value('id');

        $room->property_id = $propertyId;
        $room->room_name = $request->room_name;
        $room->number_of_beds = $request->number_of_beds;
        $room->room_rent = $request->room_rent;
        $room->min_stay = $request->min_stay;
        $room->max_stay = $request->max_stay;

        $imageName = time().'.'.$request->room_image->extension();  
        $request->room_image->move(public_path('images'), $imageName);
        $room->image_path = $imageName;
        $result = $room->save();

        if($result){
            return back()->with('Success', 'Room Created Successfully');
        } else {
            return back()->with('Error', 'Something went wrong');
        }

    }

    public function edit($id, Request $request){

        $data = Owner::where('id', '=', Session::get('loginId'))->first();
        $room = Room::where('id', '=', $id)->first();
        
        return view('owner.room.edit', compact('data', 'room'));
    }

    public function viewRoom($id){

        $data = Owner::where('id', '=', Session::get('loginId'))->first();
        $imagePath = Room::where('id','=',$id)->pluck('image_path')->first();

        return view('owner.room.view', compact('data', 'imagePath'));

    }

    public function updateRoom($id, Request $request){

        $request->validate([
            'room_name'=>'required',
            'number_of_beds'=>'required',
            'room_rent'=>'required',
            'min_stay'=>'required',
            'max_stay'=>'required',
            'room_image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $room = Room::find($id);

        if (!$room) {
            return back()->with('Error', 'Room not found');
        }

        $imageName = time().'.'.$request->room_image->extension();  
        $request->room_image->move(public_path('images'), $imageName);

        $result = $room->update([
            $room->room_name = $request->room_name,
            $room->number_of_beds = $request->number_of_beds,
            $room->room_rent = $request->room_rent,
            $room->min_stay = $request->min_stay,
            $room->max_stay = $request->max_stay,
            $room->image_path = $imageName
        ]);

        if ($result) {
            return back()->with('Success', 'Room Updated Successfully');
        } else {
            return back()->with('Error', 'Something went wrong');
        }
    }

    public function history($id){

        $data = Owner::where('id', '=', Session::get('loginId'))->first();
        
        $booking = Booking::where('owner_id', '=', $data->id)->get();

        //return compact('data', 'booking');
        return view('owner.history', compact('data', 'booking'));
    }

    public function deleteRoom($id){
        
        $room = Room::find($id);
        $result = $room->delete();
        
        if ($result) {
            return back()->with('Success', 'Room Deleted Successfully');
        } else {
            return back()->with('Error', 'Something went wrong');
        }
    }
}
