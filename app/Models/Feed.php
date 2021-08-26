<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    use HasFactory;

    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    protected $fillable = [
        'user_id',
        'tweet_id',
        'isRetweet',
    ];

    protected $guarded = [
        'id',
    ];
}
