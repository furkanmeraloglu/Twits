<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tweet;

class UserController extends Controller
{
    // Resource dışında eklenen metotların rotasının verilip verilmediği web.php'den kontrol et. 

    public function follow(Request $request, User $user)
    {
        $request->user()->follow($user);
        return redirect()->route('dashboard');
    }

    public function unfollow(Request $request, User $user)
    {
        $request->user()->unfollow($user);
        return redirect()->route('dashboard');
    }

    public function followers(User $user){

        
        $users = User::where('id', '!=', auth()->id())->inRandomOrder()->simplePaginate(5);
        $followers = $user->followers()->get();
        return view('user.followers', compact('users', 'followers', 'user'));
    }

    public function followings(User $user){

        
        $users = User::where('id', '!=', auth()->id())->inRandomOrder()->simplePaginate(5);
        $followings = $user->followings()->get();
        return view('user.followings', compact('users', 'followings', 'user'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('id', '!=', auth()->id())->inRandomOrder()->simplePaginate(5);
        $usersIndex = User::all()->except(auth()->id());
        return view('user.index', compact('usersIndex', 'users'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $users = User::where('id', '!=', $user->id)->simplePaginate(5);
        $tweets = $user->tweets()->get();
        return view('user.show', compact('user', 'users', 'tweets'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $users = User::where('id', '!=', $user->id)->simplePaginate(5);
        $tweets = Tweet::all();
        return view('user.edit', compact('user', 'tweets', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'bio' => 'nullable|string|min:10',
            'nickname' => 'nullable|string|max:30',
            'website' => 'nullable',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'bgimg' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $destinationPath = public_path('images');

        if($request->hasFile('avatar')){
            $img = $request->file('avatar');
            $newAvatarName = uniqid() . '.' . $request->nickname . '.' . $img->getClientOriginalExtension();
            $img->move($destinationPath, $newAvatarName);
            $user->image_path = $newAvatarName;
        }elseif($request->hasFile('bgimg')){
            $bgimg = $request->file('bgimg');
            $newBgimgName = uniqid() . '.' . $request->nickname . '.' . $bgimg->getClientOriginalExtension();
            $bgimg->move($destinationPath, $newBgimgName);
            $user->bg_image_path = $newBgimgName;
        }elseif($request->bio != null){
            $user->bio = $request->bio;
        }elseif($request->nickname != null){
            $user->nickname = $request->nickname;
        }elseif($request->website != null){
            $user->website = $request->website;
        }
            $user->save();

        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
