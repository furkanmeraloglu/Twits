<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Events\CreateTweet;






class TweetController extends Controller
{
    
    // Bu controller'da oluşturulan resource olmayan tüm metotların rotasını web.php'den kontrol et.
    // Giriş yapmış kullanıcı başkasına ait bir tweet'i beğenirse, o tweet beğenilenler listesine kullanıcı id'si ve tweet id'si ile kaydolur.
    // FrontEnd'de kullanıcı profilinde oluşturulacak bir beğenilen tweetler (likes) bağlantısı ile o kullanıcının beğendiği tüm tweetler listelenebilir.

    public function like(Request $request, Tweet $tweet)
    {
        $request->user()->like($tweet);
        return redirect()->route('dashboard');
    }

    public function likers(Tweet $tweet)
    {
        $users = User::where('id', '!=', auth()->id())->inRandomOrder()->simplePaginate(5);
        $likers = $tweet->likers()->get()->except(auth()->id());
        return view('tweet.likers', compact('likers', 'users'));
    }

    public function getLikes(Request $request, User $user)
    {
        $user = $request->user();
        $users = User::where('id', '!=', auth()->id())->inRandomOrder()->simplePaginate(5);
        $likes = $user->likes()->with('likeable')->orderBy('created_at', 'DESC')->get();
        return view('tweet.likes', compact('likes', 'users', 'user'));
    }

    public function unlike(Request $request, Tweet $tweet)
    {
        $request->user()->unlike($tweet);
        return redirect()->route('dashboard');
    }

    public function favorite(Request $request, Tweet $tweet)
    {
        $request->user()->favorite($tweet);
        return redirect()->route('dashboard');
    }

    public function unfavorite(Request $request, Tweet $tweet)
    {
        $request->user()->unfavorite($tweet);
        return redirect()->route('dashboard');
    }

    public function getFavorites(User $user)
    {
        $users = User::where('id', '!=', auth()->id())->inRandomOrder()->simplePaginate(5);
        $favorites = $user->getFavoriteItems(Tweet::class)->orderBy('created_at', 'desc')->get();
        return view('tweet.favorites', compact('favorites', 'user', 'users'));
    }

    // Comment

    public function add_comment(Tweet $tweet)
    {
        $users = User::where('id', '!=', auth()->id())->inRandomOrder()->simplePaginate(5);
        return view('tweet.comment', compact('tweet', 'users'));
    }

    public function comment(Request $request, Tweet $tweet)
    {
        $request->validate([
            'content' => 'required|max:240',
        ]);
        $Childtweet = new Tweet;
        $Childtweet->user_id = $request->user()->id;
        $Childtweet->content = $request->content;
        $Childtweet->parent_id = $tweet->id;
        $Childtweet->commentedUserNickname = $tweet->user->nickname;
        $Childtweet->save();
        $Childtweet->set_hashtags($Childtweet->diverge_tags_from_content($Childtweet->content));   // Tweet'in taglerini kaydediyoruz.
        
        return redirect('/dashboard');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $tweets = Tweet::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        $users = User::where('id', '!=', auth()->id())->inRandomOrder()->simplePaginate(5);
        return view('dashboard', compact('tweets', 'users'));
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
        $request->validate([
            'content' => 'required|max:240',
        ]);
        $tweet = new Tweet;
        $tweet->user_id = $request->user()->id;
        $tweet->content = $request->content;
        $tweet->save();
        $tweet->set_hashtags($tweet->diverge_tags_from_content($tweet->content));   // Tweet'in taglerini kaydediyoruz.
        return redirect('/dashboard');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function show(Tweet $tweet)
    {
/*         buraya tweet'in commentlerini ve retweet eden userlarını alacak ve onu tweet.show'a göndereceğiz... */
        return view('tweet.show', compact('tweet'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function edit(Tweet $tweet)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tweet $tweet)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tweet $tweet)
    {
        //
    }
}
