<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use App\Models\Tweet;
use Illuminate\Http\Request;

class FeedController extends Controller
{

    // Giriş yapmış kullanıcının başka kullanıcının tweet'ini rt etmesi durumunda rt edilen tweetin rt eden kullanıcının feed'ine eklenmesi gerekiyor.
    // Bunu yapmak için de öncelikle rt eden kullanıcının id'si, rt edilen tweet'in id'si ve rt edilen tweet'in sahibinin id'si gerekiyor.
    // bu dataları ise database'e eklemek gerekiyor.

    public function retweet(Request $request, Tweet $tweet)
    {
        $feed = new Feed;
        $feed->tweet_id = $tweet->id;
        $feed->user_id = $request->user()->id;
        $feed->isRetweet = true;
        $feed->save();
        return redirect('dashboard');
        /* $request->user()->profile_feed()->attach($tweet->id);
        $request->user()->profile_feed()->attach($tweet->id, ['isRetweet' => 1]);
        $dbQuery = DB::select('select isRetweet, user_id, tweet_id from feed where tweet_id = ' . $tweet->id);
        $dbCount = count($dbQuery);
        $tweets = Tweet::all();
        $users = User::all();
        return view('dashboard', compact(['dbCount', 'tweets', 'users'])); */
    }

    public function unretweet(Request $request, Tweet $tweet)
    {
        /* $request->user() kullanılmalı burası user'a bağlı şekilde tekrar düzenlenecek. */ 
        $feed = Feed::where('tweet_id', '=', $tweet->id)->get();
        $feed->isRetweet = false;
        $feed->save();

        /* $request->user()->profile_feed()->detach($tweet->id, ['isRetweet' => 0]);
        return redirect('dashboard'); */
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feed  $feed
     * @return \Illuminate\Http\Response
     */
    public function show(Feed $feed)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feed  $feed
     * @return \Illuminate\Http\Response
     */
    public function edit(Feed $feed)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feed  $feed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feed $feed)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feed  $feed
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feed $feed)
    {
        //
    }
}
