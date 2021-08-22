<?php

namespace App\Providers;

use App\Models\Tweet;
use Illuminate\Support\ServiceProvider;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Overtrue\LaravelFollow\Events\Followed;
use Overtrue\LaravelFollow\Events\Unfollowed;
use Overtrue\LaravelFollow\UserFollower;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        if(Tag::count() != 0)
        {
            
            $tags = DB::table('tag_tweet')->orderBy('tweet_id')->cursorPaginate(5);
            return view ('layouts.rightmenu', compact('tags'));
        }
    }
}
