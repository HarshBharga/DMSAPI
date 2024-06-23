<?php

namespace App\Http\Controllers\backend;
use App\Models\donors;
use DB;
use PDF;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
class homecontroller extends Controller
{
    //
    public function redirects()
    {
        
        return view('admin.layout');
    }

   
  /**public function generatepdf($id)
    {

        //ini_set('memory_limit', '-1');
       ini_set('max_execution_time', 300);
        $data = order::find($id)->toArray();
        //dd($data);
        $pdf = PDF::loadView('admin.order.pdf', $data);
        return $pdf->download('invoice.pdf');

    }**/


    public function getdata()
    {
        $data = donors::select(DB::raw('sum(tax) as tax, id'))->groupBy('id')->get();
        //$data = donors::where('tax')->orderBy('id')->offset(1)->limit(1)->get();
        dd($data);
    }

}


