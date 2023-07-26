<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;



// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Category extends Model
{
    use HasFactory;
    use HasRoles;
    use SoftDeletes;

    public $table = 'category';

    protected $fillable = [
        'title',
        'status'
    ];

    protected $dates = ['deleted_at'];

    public function product()
    {
        return $this->hasMany('App\Models\Product');
    }
}
