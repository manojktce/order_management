<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    public $table = 'orders_detail';

    public $timestamps = false;

    protected $fillable = [
        'orders_id',
        'products_id',
        'price',
        'qty',
        'amount',
    ];    
}
