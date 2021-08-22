<?php

namespace App\Providers;

use App\Models\Tag;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        $tags = [];
        if ( Tag::count() != 0 )
        {
            $tags = Tag::withCount( 'tweets' )->orderBy( 'tweets_count', 'desc' )->take(5)->get();
        }
        view()->share( 'rightMenuTags', $tags );
    }
}
