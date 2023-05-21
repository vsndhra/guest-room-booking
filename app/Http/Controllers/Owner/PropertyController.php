<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Owner;
use Session;


class PropertyController extends Controller
{
    //lists the properties owned by the owner
    public function listProperty(){
        
        $property = array();
        
        if(Session::has('loginId')){

            $data = Owner::where('id', '=', Session::get('loginId'))->first();
            $property = Property::where('owner_id', '=', Session::get('loginId'))->get();
        }
        
        //return $data;
        return view('owner.property.list', compact('data', 'property'));
    }

    //displays the create property form 
    public function create(){

        $data = Owner::where('id', '=', Session::get('loginId'))->first();

        return view('owner.property.create', compact('data'));
    }

    // handles the property creation action
    public function createProperty(Request $request){

        $request->validate([
            'property_name'=>'required',
            'property_address'=>'required'
        ]);

        $property = new Property();

        $property->owner_id = Session::get('loginId');
        $property->property_name = $request->property_name;
        $property->property_address = $request->property_address;
        $result = $property->save();

        if($result){
            return back()->with('Success', 'Property Created Successfully');
        } else {
            return back()->with('Error', 'Something went wrong');
        }

    }

    //displays the form to edit the property
    public function edit($id, Request $request){

        $data = Owner::where('id', '=', Session::get('loginId'))->first();
        $property = Property::where('id', '=', $id)->first();
        
        return view('owner.property.edit', compact('data', 'property'));
    }

    //handles update property action
    public function updateProperty($id, Request $request){

        $request->validate([
            'property_name' => 'required',
            'property_address' => 'required'
        ]);

        $property = Property::find($id);

        if (!$property) {
            return back()->with('Error', 'Property not found');
        }

        $result = $property->update([
            'property_name' => $request->property_name,
            'property_address' => $request->property_address
        ]);

        if ($result) {
            return back()->with('Success', 'Property Updated Successfully');
        } else {
            return back()->with('Error', 'Something went wrong');
        }
    }

    //deletes the property
    public function deleteProperty($id){
        
        $property = Property::find($id);
        $result = $property->delete();
        
        if ($result) {
            return back()->with('Success', 'Property Deleted Successfully');
        } else {
            return back()->with('Error', 'Something went wrong');
        }
    }
}
