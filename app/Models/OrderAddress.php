<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderAddress extends Model
{
    use HasFactory;

    public $table = 'orders_address';

    public $timestamps = false;

    protected $fillable = [
        'orders_id',
        'first_name',
        'last_name',
        'email',
        'mobile_number',
        'address',
        'city',
        'notes',
    ];
}
