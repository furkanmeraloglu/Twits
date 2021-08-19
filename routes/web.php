<?php

use App\Http\Controllers\TweetController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Tweet;

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
Route::get('tweets/{tweet}/like', [TweetController::class, 'like'])->name('tweets.like');
Route::get('tweets/{tweet}/unlike', [TweetController::class, 'unlike'])->name('tweets.unlike');
Route::get('tweets/{tweet}/retweet', [TweetController::class, 'retweet'])->name('tweets.retweet');
Route::get('tweets/{tweet}/unretweet', [TweetController::class, 'unretweet'])->name('tweets.unretweet');
Route::get('tweets/{tweet}/favorite', [TweetController::class, 'favorite'])->name('tweets.favorite');
Route::get('tweets/{tweet}/unfavorite', [TweetController::class, 'unfavorite'])->name('tweets.unfavorite');
Route::get('tweets/homepage', [TweetController::class, 'homepage'])->name('tweets.homepage');
Route::get('tweets/user_profile', [TweetController::class, 'user_profile'])->name('user_profile');

Route::get('/dashboard', function () {
    $users = User::where('id', '!=', auth()->id())->simplePaginate(5) ;
    $tweets = Tweet::all();
    return view('dashboard', compact('users', 'tweets'));
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
