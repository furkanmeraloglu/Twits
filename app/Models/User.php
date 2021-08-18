<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Overtrue\LaravelFavorite\Traits\Favoriter;
use Overtrue\LaravelFollow\Followable;
use Overtrue\LaravelLike\Traits\Likeable;
use Overtrue\LaravelLike\Traits\Liker;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Followable, Liker, Favoriter;

    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }

    public function profile_feed()
    {
        return $this->belongsToMany(Tweet::class, 'feed');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'nickname',
        'birth_date',
        'bio',
        'website',
        'image_path',
        'bg_image_path',
        'email',
        'password',
    ];

    protected $guarded = [
        'id',
        'isAdmin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
