<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Donation extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'donations';
   
    protected $fillable = [
       'bank',
            'fiscal',
            'amount',
            'transaction_no',
            'transaction_date',
            'mode',
            'status',
            'created_by',
            'approved_by',

    ];
}
