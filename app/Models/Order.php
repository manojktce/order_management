<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $table = 'orders';

    protected $fillable = [
        'users_id',
        'stripe_pi_id',
        'stripe_resp',
        'total_amount',
        'status',
    ];

    protected $dates = ['deleted_at'];

    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function orders_detail()
    {
        return $this->hasMany('App\Models\OrderDetail');
    }

    public function orders_address()
    {
        return $this->hasOne('App\Models\OrderAddress');
    }
}
