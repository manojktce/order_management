<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRating extends Model
{
    use HasFactory;

    public $table = 'product_ratings';

    public $timestamps = false;

    protected $fillable = [
        'users_id',
        'products_id',
        'rating',
        'review',
    ];  

    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function products()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
