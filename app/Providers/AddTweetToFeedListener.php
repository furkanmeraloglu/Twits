<?php

namespace App\Providers;

use App\Providers\CreateTweet;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
        //
    }
}
