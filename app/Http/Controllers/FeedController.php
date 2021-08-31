<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeedController extends Controller
{

    // Giriş yapmış kullanıcının başka kullanıcının tweet'ini rt etmesi durumunda rt edilen tweetin rt eden kullanıcının feed'ine eklenmesi gerekiyor.
    // Bunu yapmak için de öncelikle rt eden kullanıcının id'si, rt edilen tweet'in id'si ve rt edilen tweet'in sahibinin id'si gerekiyor.
    // bu dataları ise database'e eklemek gerekiyor.

    public function retweet(Request $request, Tweet $tweet)
    {
<<<<<<< HEAD
        
        $feed = new Feed;
        $feed->tweet_id = $tweet->id;
        $feed->user_id = $request->user()->id;
        $feed->isRetweet = true;
        $feed->save();
        return redirect('dashboard');
       
=======
            $feed = new Feed;
            $feed->tweet_id = $tweet->id;
            $feed->user_id = $request->user()->id;
            $feed->isRetweet = true;
            $feed->save();
            return redirect('dashboard');
>>>>>>> 3bf3745d6833904cd0120c593d2144b0ad69c5c9
    }

    public function unretweet(Request $request, Tweet $tweet)
    {
        /* DB::table('feeds')->where('user_id', '=', $request->user()->id and 'tweet_id', '=', $tweet->id)->delete(); */
        $feedToDelete = Feed::where('user_id', '=', $request->user()->id and 'tweet_id', '=', $tweet->id);
        $feedToDelete->delete();
        return redirect('dashboard');
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
