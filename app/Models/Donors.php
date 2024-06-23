<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Donors extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'donors';
   
    protected $fillable = [
       'name',
           'email',
           'phone',
           'address',
           'country',
           'state',
           'city',
           'pincode',
           'tax',

    ];
}
