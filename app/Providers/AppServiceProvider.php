<?php

namespace App\Providers;

use App\Models\Tag;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

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
        try {
            $suggestedUsers = User::where( 'id', '!=', auth()->id() )->inRandomOrder()->simplePaginate( 5 );
            $tags = Tag::withCount( 'tweets' )->orderBy( 'tweets_count', 'desc' )->take( 5 )->get();
        } catch ( Exception $e ) {
            $tags = [];
            $suggestedUsers = [];
        }
        $user = Auth::user();
        view()->share('suggestedUsers', $suggestedUsers);
        view()->share('rightMenuTags', $tags);
        
    }
}
