<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelFavorite\Traits\Favoriteable;
use Overtrue\LaravelLike\Traits\Likeable;

class Tweet extends Model
{
    use HasFactory, Likeable, Favoriteable;

    public function tweet_feed()
    {
        return $this->belongsToMany(User::class, 'feed');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function parent()
    {
        return $this->belongsTo(Tweet::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Tweet::class, 'parent_id');
    }

    protected $fillable = [
        'content',
    ];

    protected $guarded = [
        'id'
    ];

    public function diverge_tags_from_content($content)
    {
        $tagString = "";
        if ($content) {
            $divergedContent = explode(" ", $content);
            foreach ($divergedContent as $word) {
                if ($word[0] === '#') {
                    $tagString = $tagString . " " . $word;
                }
            }
        }
        return $tagString;
    }

    public function set_hashtags($tagString)
    {
        if ($tagString) {
            $tagsToAttach = array_unique(array_map('trim', explode(" ", $tagString)));
            foreach ($tagsToAttach as $tagName) {
                $hashtag = Tag::firstOrCreate([
                    'hashtag' => $tagName,
                ]);
                $this->tags()->attach($hashtag->id);
            }
        }
    }
}
