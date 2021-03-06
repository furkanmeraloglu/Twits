<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tweet;
use App\Models\Feed;
use App\Notifications\SendFollowNotification;
use Multiavatar;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    // Resource dışında eklenen metotların rotasının verilip verilmediği web.php'den kontrol et.

    public function follow(Request $request, User $user)
    {
        $request->user()->follow($user);
        $user->notify(new SendFollowNotification());
        return redirect()->route('dashboard');
    }

    public function unfollow(Request $request, User $user)
    {
        $request->user()->unfollow($user);
        return redirect()->route('dashboard');
    }

    public function followers(User $user)
    {
        $users = User::where('id', '!=', auth()->id())->inRandomOrder()->simplePaginate(5);
        $followers = $user->followers()->get();
        return view('user.followers', compact('users', 'followers', 'user'));
    }

    public function followings(User $user)
    {
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
        $usersIndex = User::where('id', '!=', auth()->id())->inRandomOrder()->simplePaginate(10);
        $bg_destination = "user_index_cover.jpg";
        return view('user.index', compact('usersIndex', 'users', 'bg_destination'));
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

    public function creatUserAvatar(User $user){

        $multiavatar = new Multiavatar();
        $avatarId = uniqId();
        $fileName = $avatarId . '.' . 'svg';
        $avatar = $multiavatar->generate($avatarId, null, null);
        Storage::disk('public')->put($fileName, $avatar);
        $user->image_path = $fileName;
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
        /* $tweets = $user->tweets()->get(); */
        $userIds = $user->followings->pluck('id')->toArray();
        $userIds[] = $user->id;
        $feed = Feed::with(['tweet', 'user', 'tweet.user'])->whereIn('user_id', $userIds)->orderBy('created_at', 'desc')->get();
        return view('user.show', compact('user', 'users', 'feed', 'user'));
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

            if($request->bio != null){$user->bio = $request->bio;}
            if($request->nickname != null){$user->nickname = $request->nickname;}
            if($request->website != null){$user->website = $request->website;}



        if($request->hasFile('avatar')){

            $img = $request->file('avatar');
            $newAvatarName = uniqid() . '.' . $img->getClientOriginalExtension();
                if($user->image_path != null){
                    Storage::disk('public')->delete($user->image_path);
                }
            Storage::disk('public')->put($newAvatarName, file_get_contents($img));
            $user->image_path = $newAvatarName;

        }if($request->hasFile('bgimg')){
            $bgimg = $request->file('bgimg');
            $newBgimgName = uniqid() . '.' . $bgimg->getClientOriginalExtension();
                if($user->bg_image_path != null){
                    Storage::disk('public')->delete($user->bg_image_path);
                }
            Storage::disk('public')->put($newBgimgName, file_get_contents($bgimg));
            $user->bg_image_path = $newBgimgName;
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
