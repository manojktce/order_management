<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;

use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

use Laravel\Cashier\Billable;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable;

    use HasRoles;

    use SoftDeletes;

    use InteractsWithMedia;

    use Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'status',
        'social_id',
        'social_type'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];

    protected $dates = ['deleted_at'];

    public function product()
    {
        return $this->hasMany('App\Models\Product');
    }
}
