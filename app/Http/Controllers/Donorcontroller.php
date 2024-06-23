<?php

namespace App\Http\Controllers;
use App\Models\Donors;
use App\Models\User;
use Illuminate\Http\Request;

class donorcontroller extends Controller
{
    //
    public function adddonor(Request $request) // add donor
    {
         $input = array(
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'country' => $request->country,
            'state' => $request->state,
            'pincode' => $request->pincode,
            'tax' => $request->tax,
        );
       
        $data = Donors::create($input);
        $donor = array(
            'name'=>$request->name,
            'email'=>$request->email,
            'mobile'=>$request->phone,
            
            
        );
        User::create($donor);
        return response()->json(['input' => $input], 200);
    }

    public function edit_donor(Request $request,$id) //edit donor
    {
        $details = array(
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'country' => $request->country,
            'state' => $request->state,
            'pincode' => $request->pincode,
            'tax' => $request->tax,
           
            );
        Donors::where('id',$id)->Update($details);
        return response()->json(['details' => $details], 200);
    }
    

    public function getdonors() //list donor
    {
        $data = Donors::all();
        return response()->json(['data'=>$data], 200);
    }

    public function searchdonor(Request $request) // list data
    {
       // $formdate = Carbon::parse(request('from_date')->endofday());

        $data = Donors::where('name','LIKE', '%' .$request->name. '%')
        ->orwhere('tax', 'LIKE', '%' .$request->name . '%')
        ->orwhere('email', 'LIKE', '%' .$request->name . '%')
        ->orwhere('created_at','LIKE','%' .$request->name)->get();

        return response()->json(['data' => $data], 200);
    }

}
