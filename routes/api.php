<?php
use App\Http\Controllers\PassportAuthController;
use App\Http\Controllers\Donorcontroller;
use App\Http\Controllers\Bankcontroller;
use App\Http\Controllers\Donationcontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
   return $request->user();
});


//user 
Route::post('login', [PassportAuthController::class, 'login']);

Route::get('users',[PassportAuthController::class, 'getuser']);
Route::post('create',[PassportAuthController::class, 'adduser']);
Route::post('/edit_profile/{id}',[PassportAuthController::class,'edit_profile']);

Route::post('create/donors',[Donorcontroller::class, 'adddonor']);
Route::post('/edit_donor/{id}',[Donorcontroller::class,'edit_donor']);
Route::get('donors',[Donorcontroller::class,'getdonors']);
Route::post('searchdonor',[Donorcontroller::class,'searchdonor']);


Route::get('banks',[Bankcontroller::class,'getbank']);
Route::post('create/banks',[Bankcontroller::class,'addbank']);
Route::post('edit/banks/{id}',[Bankcontroller::class,'editbank']);
Route::delete('delete/bank/{id}',[Bankcontroller::class,'deletebank']);

Route::post('create/donation',[Donationcontroller::class,'adddonation']);
Route::get('donation',[Donationcontroller::class,'getdonation']);
Route::post('searchdonation',[Donationcontroller::class,'searchdonation']);
Route::post('/edit_donation/{id}',[Donationcontroller::class,'edit_donation']);
