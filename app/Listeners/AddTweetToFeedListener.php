<?php

namespace App\Listeners;

use App\Events\CreateTweet;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Feed;

class AddTweetToFeedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CreateTweet  $event
     * @return void
     */
    public function handle(CreateTweet $event)
    {
        $tweet = $event->tweet;
        $feed = new Feed;
        $feed->tweet_id = $tweet->id;
        $feed->user_id = $tweet->user->id;

        // Burada gelen tweet'in rt olup olmadığını nasıl anlayacağız? Ona göre feed'e de eklemek gerekecek.

        $feed->save();
    }
}
