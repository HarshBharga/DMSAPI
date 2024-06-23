<?php

namespace App\Http\Controllers;
use App\Models\Bank;
use Illuminate\Http\Request;

class bankcontroller extends Controller
{
    //
     public function addbank(Request $request) // add donor
    {
         $input = array(
            'account_name' => $request->account_name,
            'account_number' => $request->account_number,
            'ifsc' => $request->ifsc,
            'swift_code' => $request->swift_code,
            'branch' => $request->branch,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            //'status' => $request->status,
        );
        Bank::create($input);
        return response()->json(200);
    }

    public function getbank()
    {
        $data = Bank::all();
        return response()->json(['data' => $data], 200);

    }

    public function editbank(Request $request,$id) //edit bank
    {
        $details = array(
            'account_name' => $request->account_name,
            'account_number' => $request->account_number,
            'ifsc' => $request->ifsc,
            'swift_code' => $request->swift_code,
            'branch' => $request->branch,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            //'status' => $request->status,
           
            );
        Bank::where('id',$id)->Update($details);
        return response()->json(['details' => $details], 200);
    }
    

    public function deletebank(Request $request,$id)
    {
        $data = Bank::find($id);
        $data->Delete();
        return response()->json(['data' => $data], 200);
    }


}
