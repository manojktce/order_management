<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRating extends Model
{
    use HasFactory;

    public $table = 'products_rating';

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
        return $this->hasMany('App\Models\Product');
    }
}
