<?php

use App\Http\Controllers\TweetController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Tweet;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('users', UserController::class);
Route::resource('tweets', TweetController::class);
Route::resource('tags', TagController::class);

Route::get('users/{user}/follow', [UserController::class, 'follow'])->name('users.follow');
Route::get('users/{user}/unfollow', [UserController::class, 'unfollow'])->name('users.unfollow');
Route::get('users/{user}/followers', [UserController::class, 'followers'])->name('users.followers');
Route::get('users/{user}/followings', [UserController::class, 'followings'])->name('users.followings');
Route::get('tweets/{tweet}/like', [TweetController::class, 'like'])->name('tweets.like');
Route::get('tweets/{tweet}/unlike', [TweetController::class, 'unlike'])->name('tweets.unlike');
Route::get('tweets/{tweet}/retweet', [TweetController::class, 'retweet'])->name('tweets.retweet');
Route::get('tweets/{tweet}/unretweet', [TweetController::class, 'unretweet'])->name('tweets.unretweet');
Route::get('tweets/{tweet}/favorite', [TweetController::class, 'favorite'])->name('tweets.favorite');
Route::get('tweets/{tweet}/unfavorite', [TweetController::class, 'unfavorite'])->name('tweets.unfavorite');
Route::get('tweets/{tweet}/likers', [TweetController::class, 'likers'])->name('tweets.likers');
Route::get('tweets/getFavorites', [TweetController::class, 'getFavorites'])->name('tweets.getFavorites');

Route::get('/dashboard', function () {
    $users = User::where('id', '!=', auth()->id())->inRandomOrder()->simplePaginate(5);
    $userIds = Auth::user()->followings->pluck('id')->toArray();
    $userIds[] = Auth::user()->id;
    $tweets = Tweet::with(['user'])->whereIn('user_id', $userIds)->orderBy('created_at', 'desc')->get();
    return view('dashboard', compact('users', 'tweets'));
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
