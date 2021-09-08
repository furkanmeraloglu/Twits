<x-app-layout>

    @include('layouts.userMenu')


        <div class="w-full lg:w-1/2 bg-white mb-4">

            <div class="p-3 text-lg font-bold border-b border-solid border-grey-light">

            </div>


            {{-- tweet card --}}

            @foreach ($tweets as $tweet)

                <div class="flex border-b border-solid border-grey-light">
                    <div class="w-1/8 text-right pl-3 pt-3">

                        <div><a href="#"><img src="{{ asset('storage/' . $tweet->user->image_path) }}" alt="avatar"
                                    class="rounded-full h-12 w-12 mr-2"></a></div>

                    </div>
                    <div class="w-7/8 p-3 pl-0">
                        @if ($tweet->parent_id)
                        <div><i class="fa fa-comment text-grey-dark mr-2"></i><span
                                class="text-xs text-grey-dark">{{ 'Replys to: ' . '@' . $tweet->commentedUserNickname }}</span>
                        </div>
                        @endif

                        <div class="flex justify-between">
                            <div>
                                <span class="font-bold"><a href="#"
                                        class="text-black">{{ $tweet->user->name }}</a></span>
                                <span class="text-grey-dark"> {{"@" . $tweet->user->nickname }}</span>

                                <span class="text-grey-dark">{{ $tweet->created_at }}</span>
                            </div>

                        </div>

                        <div>
                            <a href="{{ route('tweets.show', $tweet) }}">
                            <div class="mb-4">
                                <p class="mb-6">{{ $tweet->content }}</p>
                            </div>
                            </a>
                    
                        </div>
                        <div class="pb-2">

                            {{-- Comment section --}}
                            <span class="mr-8"><a href="{{ route('tweets.add_comment', $tweet) }}"
                                class="text-grey-dark hover:no-underline hover:text-blue-light"><i
                                    class="fa fa-comment fa-lg mr-2"></i>
                                @if ($tweet->children()->count())
                                    {{ $tweet->children()->count() }}
                                @else
                            </a>0</span>
                                @endif

                            {{-- Bookmark section --}}
                            @if ($tweet->isFavoritedby(Auth::user()))
                                <span class="mr-8"><a href="{{ route('tweets.unfavorite', $tweet) }}"
                                        class="text-grey-dark hover:no-underline hover:text-blue-light"><i
                                            class="fa fa-bookmark fa-lg mr-2 text-red-700"></i>{{ $tweet->favoriters()->count() }}
                                    </a></span>
                            @else
                                <span class="mr-8"><a href="{{ route('tweets.favorite', $tweet) }}"
                                        class="text-grey-dark hover:no-underline hover:text-blue-light"><i
                                            class="fa fa-bookmark fa-lg mr-2"></i>{{ $tweet->favoriters()->count() }}
                                    </a></span>
                            @endif

                            {{-- Retweet section --}}
                            <span class="mr-8"><a href="{{ route('feeds.retweet', $tweet) }}"
                                    class="text-grey-dark hover:no-underline hover:text-green"><i
                                        class="fa fa-retweet fa-lg mr-2"></i> 29</a></span>

                            {{-- Like section --}}
                            @if ($tweet->isLikedby(Auth::user()))
                                <span class="mr-8"><a href="{{ route('tweets.unlike', $tweet) }}"
                                        class="text-grey-dark hover:no-underline hover:text-red"><i
                                            class="fa fa-heart fa-lg mr-2 text-red-700"></i><a
                                            href="{{ route('tweets.likers', $tweet) }}">
                                            {{ $tweet->likers()->count() }}</a></a></span>
                            @else
                                <span class="mr-8"><a href="{{ route('tweets.like', $tweet) }}"
                                        class="text-grey-dark hover:no-underline hover:text-red"><i @if ($tweet->likers()->count() > 0)
                                            class="fa fa-heart fa-lg mr-2"></i><a
                                            href="{{ route('tweets.likers', $tweet) }}">{{ $tweet->likers()->count() }}</a></a></span>
                            @else
                                class="fa fa-heart fa-lg mr-2"></i>0</a></span>
                            @endif
            @endif

        </div>
    </div>
    </div>

    {{-- tweet card end --}}
    @endforeach






    </div>

    @include('layouts.rightmenu')

    </div>

    </body>
</x-app-layout>
