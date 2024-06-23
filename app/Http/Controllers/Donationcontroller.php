<?php

namespace App\Http\Controllers;
use App\Models\Donation;
use Illuminate\Http\Request;

class donationcontroller extends Controller
{
    //
    public function adddonation(Request $request) // add donor
    {
         $input = array(
            'bank' => $request->bank,
            'fiscal' => $request->fiscal,
            'amount' => $request->amount,
            'transaction_no' => $request->transaction_no,
            'transaction_date' => $request->transaction_date,
            'mode' => $request->mode,
            'created_by' => $request->created_by,
            //'status' => $request->status,
        );
        Donation::create($input);
        return $this->respondWithSuccess($input, 200);
    }

    public function getdonation() //list donation
    {
        $data = Donation::all();
        return response()->json(['data'=>$data], 200);
    }

    public function searchdonation(Request $request) // list data
    {
       $data = Donation::where('transaction_no','LIKE', '%' .$request->name. '%')
        ->orwhere('bank', 'LIKE', '%' .$request->name . '%')
        ->orwhere('created_at','LIKE','%' .$request->name)->get();

        return response()->json(['data' => $data], 200);
    }

    public function edit_donation(Request $request,$id) // add donor
    {
         $input = array(
            'bank' => $request->bank,
            'fiscal' => $request->fiscal,
            'amount' => $request->amount,
            'transaction_no' => $request->transaction_no,
            'transaction_date' => $request->transaction_date,
            'mode' => $request->mode,
            'created_by' => $request->created_by,
            'status' => $request->status,
        );
        Donation::where('id',$id)->Update($input);
        return response()->json(['input' => $input], 200);
    }

}
