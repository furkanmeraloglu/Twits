<?php

namespace App\Providers;

use App\Models\Tweet;
use Illuminate\Support\ServiceProvider;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
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
            return view ('layouts.rightmenu', Tag::get()->paginate(5));
        }
    }
}
