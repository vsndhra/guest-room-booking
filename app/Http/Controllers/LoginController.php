<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;
use App\Models\Guest;
use App\Models\Room;
use App\Models\Property;
use App\Models\Booking;
use Hash;
use Session;

class LoginController extends Controller
{
    //display owner login form
    public function ownerLogin(){
        return view('auth.houseowner');
    }

    //displays the guest login form
    public function guestLogin(){
        return view('auth.guest');
    }

    //displays owner register form
    public function ownerRegister(){
        return view('auth.registerOwner');
    }

    //displays guest register form
    public function guestRegister(){
        return view('auth.registerGuest');
    }

    //handles owner log in
    public function loginOwner(Request $request){
        
        $request->validate([
            'email'=>'required',
            'password'=>'required|min:5|max:12'
        ]);

        $owner = Owner::where('owner_email', '=', $request->email)->first();

        if($owner){
            if(Hash::check($request->password, $owner->owner_password)){
                $request->session()->put('loginId', $owner->id);
                return redirect('admin');

            } else {
                return back()->with('Error', 'Incorrect password');
            }
        } else {
            return back()->with('Error', 'This Email is not Registered!'); //worked
        }

    }

    //handles guest log in
    public function loginGuest(Request $request){
        
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12'
        ]);

        $guest = Guest::where('guest_email', '=', $request->email)->first();

        if($guest){
            if(Hash::check($request->password, $guest->guest_password)){
                $request->session()->put('loginId', $guest->id);
                return redirect('dashboard');

            } else {
                return back()->with('Error', 'Incorrect password');
            }
        } else {
            return back()->with('Error', 'This Email is not Registered!'); //worked
        }

    }

    //handles owner registration
    public function registerOwner(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'phone'=>'required',
            'password'=>'required|min:5|max:12'
        ]);

        $owner = new Owner();

        $owner->owner_name = $request->name;
        $owner->owner_email = $request->email;
        $owner->owner_phone = $request->phone;
        $owner->owner_password = Hash::make($request->password);
        $result = $owner->save();

        if($result){
            return back()->with('Success', 'Registered Successfully');
        } else {
            return back()->with('Error', 'Something went wrong');
        }

    }

    //handles guest registration
    public function registerGuest(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'phone'=>'required',
            'password'=>'required|min:5|max:12'
        ]);

        // $route = $request->route()->getName();

        // if($route == 'register-owner'){
        //     $is_admin = 1;
        // }

        $guest = new Guest();

        $guest->guest_name = $request->name;
        $guest->guest_email = $request->email;
        $guest->guest_phone = $request->phone;
        $guest->guest_password = Hash::make($request->password);
        $result = $guest->save();

        if($result){
            return back()->with('Success', 'Registered Successfully');
        } else {
            return back()->with('Error', 'Something went wrong');
        }

    }

    //displays dashboard for owner
    public function ownerDashboard(){

        $data = array();

        if(Session::has('loginId')){
            $data = Owner::where('id', '=', Session::get('loginId'))->first();
            
            $user_id = Session::get('loginId');// User ID of the current user to retrieve data for

            // Total properties
            $totalProperties = Property::where('owner_id', $user_id)->count();
            
            // Total rooms
            $totalRooms = Room::join('properties', 'rooms.property_id', '=', 'properties.id')
            ->where('properties.owner_id', $user_id)
            ->count();
            
            // Total bookings
            $totalBookings = Booking::where('owner_id', $user_id)->count();
        }

        //return compact('data', 'totalProperties', 'totalRooms', 'totalBookings');
        return view('owner.analytics', compact('data', 'totalProperties', 'totalRooms', 'totalBookings'));
    }

    //displays guest dashboard
    public function guestDashboard(){

        $data = array();
        if(Session::has('loginId')){
            $data = Guest::where('id', '=', Session::get('loginId'))->first();
        }
        return view('guest.home', compact('data'));
    }

    //handles log out action
    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('/');
        }
    }
}
