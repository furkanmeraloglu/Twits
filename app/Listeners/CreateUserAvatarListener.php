<?php

namespace App\Listeners;

use App\Events\CreateUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;
use Multiavatar;

class CreateUserAvatarListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(CreateUser $event)
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CreateUser  $event
     * @return void
     */
    public function handle(CreateUser $event)
    {
        $user = $event->user;
        $multiavatar = new Multiavatar();
        $avatarId = uniqId();
        $fileName = $avatarId . '.' . 'svg';
        $avatar = $multiavatar->generate($avatarId, null, null);
        Storage::disk('public')->put($fileName, $avatar);
        $user->image_path = $fileName;
        $user->save();
        
    }
}
