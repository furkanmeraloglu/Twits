<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    // Bu controller'da oluşturulan resource olmayan tüm metotların rotasını web.php'den kontrol et.

    // Bir kullanıcıcın profilinde kendi twitleri ve retweet ettiği tweetler bulunacak. (index)

    public function user_profile(Request $request)
    {

    }

    // Homepage sayfasında bir kullanıcının takip ettiği kişilerin twitleri ve kendi twitleri yer alacak (index)

    public function homepage(Request $request)
    {
        $userIds = $request->user()->followings->pluck('id')->toArray();
        $userIds[] = $request->user()->id;
        $twits = Tweet::with(['user'])->whereIn('user_id', $userIds)->orderBy('created_at', 'desc')->get();

        return view('dashboard', compact('twits'));
    }

    // Giriş yapmış kullanıcı başkasına ait bir tweet'i beğenirse, o tweet beğenilenler listesine kullanıcı id'si ve tweet id'si ile kaydolur.
    // FrontEnd'de kullanıcı profilinde oluşturulacak bir beğenilen tweetler (likes) bağlantısı ile o kullanıcının beğendiği tüm tweetler listelenebilir.

    public function like(Request $request, Tweet $tweet)
    {
        $request->user()->like($tweet);
        return redirect()->route('dashboard');
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

    // Giriş yapmış kullanıcının başka kullanıcının tweet'ini rt etmesi durumunda rt edilen tweetin rt eden kullanıcının feed'ine eklenmesi gerekiyor.
    // Bunu yapmak için de öncelikle rt eden kullanıcının id'si, rt edilen tweet'in id'si ve rt edilen tweet'in sahibinin id'si gerekiyor.
    // bu dataları ise database'e eklemek gerekiyor.

    public function retweet(Request $request, Tweet $tweet)
    {
        $request->user()->profile_feed()->pluck($tweet->id)->attach(['isRetweet' => true]);
    }

    public function unretweet(Request $request, Tweet $tweet)
    {
        $request->user()->profile_feed()->detach($tweet->id, ['isRetweet' => false]);
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
        $request->validate([
            'content' => 'required|max:140',
        ]);

        $tweet = new Tweet;
        $tweet->user_id = $request->user()->id;
        $tweet->content = $request->content;
        $tweet->save();

        $tweet->set_hashtags($tweet->diverge_tags_from_content($tweet->content));   // Tweet'in taglerini kaydediyoruz.
        $request->user()->profile_feed()->attach($tweet);                           // Atılan tweet'i kullanıcının feed'ine de ekliyoruz.

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
