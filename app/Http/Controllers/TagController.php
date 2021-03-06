<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Tweet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('id', '!=', auth()->id())->inRandomOrder()->simplePaginate(5);
        $bg_destination = "tag_cover.jpg";
        $tweets = Tweet::all();
        $tags = Tag::withCount('tweets')->orderBy('tweets_count', 'desc')->paginate(10);

        return view ('tag.index', compact(['tags', 'users', 'tweets', 'bg_destination']));
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
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        $users = User::where('id', '!=', auth()->id())->inRandomOrder()->simplePaginate(5);
        $tags = Tag::all();
        $tagTweets = Tag::find($tag->id)->tweets()->orderBy('created_at', 'DESC')->get();
        return view ('tag.show', compact(['tag','tagTweets', 'tags', 'users']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        //
    }
}
