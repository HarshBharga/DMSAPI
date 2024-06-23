<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;
use Carbon;
use Illuminate\Support\Str;

class PassportAuthController extends Controller
{
     
    public function login(Request $request) //login
    {
       $data =[
            'email' => $request->email,
            'password' => $request->password
        ];
 
        if (Auth()->attempt($data))
        {
            $user=User::where('email',$request->email)->first();
            $data['user']=$user;
            $token = auth()->user()->createToken('LaravelAuthApp')->accessToken;
            return response()->json(['token'=> $token,'data'=>$data], 200);
        }
       else
       {
        return response()->json(['error' => 'Unauthorised'], 401);
       }
    }

    public function getuser() //list users
    {
        $data = User::all();
        return response()->json(['data'=>$data], 200);
    }

    public function adduser(Request $request) //user add
    {
        $input = array(
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request['password']),
            'mobile' => $request->mobile,
            'role' => $request->assignRole('User')
        );
    
        $input = $request->all();
        User::create($input);
        
        return response()->json(['input'=>$input], 200);
        
    }    

    public function edit_profile(Request $request,$id) //edit user
    {
        $details = array(
            'name'=>$request->name,
            'mobile'=>$request->mobile,
            'email'=>$request->email,
           
           );
        User::where('id',$id)->Update($details);
        return response()->json(['details' => $details], 200);
    }

    


   
    
}           
