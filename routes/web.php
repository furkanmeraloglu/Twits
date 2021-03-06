<?php

use App\Http\Controllers\FeedController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Tweet;
use App\Models\Feed;
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

/* Routes for Resource Methods in Model Controllers */

Route::resource('users', UserController::class);
Route::resource('tweets', TweetController::class);
Route::resource('tags', TagController::class);

/* Routes for Methods in UserController */

Route::get('users/{user}/follow', [UserController::class, 'follow'])->name('users.follow');
Route::get('users/{user}/unfollow', [UserController::class, 'unfollow'])->name('users.unfollow');
Route::get('users/{user}/followers', [UserController::class, 'followers'])->name('users.followers');
Route::get('users/{user}/followings', [UserController::class, 'followings'])->name('users.followings');

/* Routes for Methods in TweetController */

Route::get('tweets/{tweet}/like', [TweetController::class, 'like'])->name('tweets.like');
Route::get('tweets/{tweet}/unlike', [TweetController::class, 'unlike'])->name('tweets.unlike');
Route::get('tweets/{tweet}/favorite', [TweetController::class, 'favorite'])->name('tweets.favorite');
Route::get('tweets/{tweet}/unfavorite', [TweetController::class, 'unfavorite'])->name('tweets.unfavorite');
Route::get('tweets/{tweet}/likers', [TweetController::class, 'likers'])->name('tweets.likers');
Route::get('tweets/{user}/getFavorites', [TweetController::class, 'getFavorites'])->name('tweets.getFavorites');
Route::get('tweets/{user}/getLikes', [TweetController::class, 'getLikes'])->name('tweets.getLikes');
Route::get('tweets/{tweet}/add_comment', [TweetController::class, 'add_comment'])->name('tweets.add_comment');
Route::post('tweets/{tweet}/comment', [TweetController::class, 'comment'])->name('tweets.comment');
Route::post('tweets/{tweet}/retweet', [TweetController::class, 'retweet'])->name('tweets.retweet');

/* Routes for Methods in FeedController */

Route::get('feeds/{tweet}/retweet', [FeedController::class, 'retweet'])->name('feeds.retweet');
Route::get('feeds/{tweet}/unretweet', [FeedController::class, 'unretweet'])->name('feeds.unretweet');

/* Main Route for Dashboard */

Route::get('/dashboard', function () {
    
    $user = Auth::user();
    $userIds = Auth::user()->followings->pluck('id')->toArray();
    $userIds[] = Auth::user()->id;
    $feed = Feed::with(['tweet', 'user', 'tweet.user'])->whereIn('user_id', $userIds)->orderBy('created_at', 'desc')->get();
    return view('dashboard', compact('feed', 'user'));
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
