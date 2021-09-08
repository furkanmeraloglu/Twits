<x-app-layout>

    @include('layouts.userMenu')

    <div class="w-full lg:w-1/2 bg-white mb-4">

        <div class="p-3 text-lg font-bold border-b border-solid border-grey-light">
            <a href="{{ route('tweets.index') }}" class="text-black mr-6 no-underline hover-underline">Tweets</a>
            <a href="#" class="mr-6 text-teal no-underline hover:underline">Tweets &amp; Replies</a>
            <a href="#" class="mr-6 text-teal no-underline hover:underline">Retweets</a>
        </div>

            {{-- Tweet section --}}

            <form action="{{ route('tweets.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <textarea id="tweet" name="content" class="w-full pt-5 resize-none border rounded-md"></textarea>
                    <div class="flex">
                        <button id="tweet_button" type="submit"
                            class="inline-flex items-center h-10 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-green-400 rounded-lg focus:shadow-outline hover:bg-green-600">
                            Tweet!
                        </button>
                        <p id="tweet_counter" class="text-xs text-gray-600">0</p>
                    </div>
                </div>
            </form>

            {{-- Tweet section end --}}

            {{-- tweet card --}}

            @foreach ($feed as $item)

                <div class="w-auto flex border-b border-solid border-grey-light">
                    <div class="w-1/8 text-right pl-3 pt-3">
                        {{-- tweet retweet or comment icon --}}
                        <div><a href="{{ route('users.show', $item->user) }}"><img
                                    src="{{ asset('storage/' . $item->user->image_path) }}" alt="avatar"
                                    class="rounded-full h-12 w-12 mr-2"></a></div>
                    </div>
                    <div class="w-7/8 p-3 pl-0">
                        @if ($item->tweet->parent_id)
                            <div><i class="fa fa-comment text-grey-dark mr-2"></i><span
                                    class="text-xs text-grey-dark">{{ 'Replys to: ' . '@' . $item->tweet->commentedUserNickname }}</span>
                            </div>
                        @endif
                        <div class="flex justify-between">
                            <div>
                                <span class="font-bold"><a href="{{ route('users.show', $item->user) }}"
                                        class="text-black">{{ $item->user->name }}</a></span>
                                <span class="text-grey-dark">{{ '@' . $item->user->nickname }}</span>

                                <span class="text-grey-dark"
                                    title="{{ $item->tweet->created_at }}">{{ $item->tweet->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                        <div>
                            <a href="{{ route('tweets.show', $item->tweet) }}">
                                <div class="mb-4">
                                    <p class="mb-6">{{ $item->tweet->content }}</p>
                                </div>
                            </a>
                        </div>
                        <div class="pb-2">

                            {{-- Comment section --}}
                            <span class="mr-8"><a href="{{ route('tweets.add_comment', $item->tweet) }}"
                                    class="text-grey-dark hover:no-underline hover:text-blue-light"><i
                                        class="fa fa-comment fa-lg mr-2"></i>
                                    @if ($item->tweet->children()->count())
                                        {{ $item->tweet->children()->count() }}
                                    @else
                                </a>0</span>
            @endif

            {{-- bookmark section --}}
            @if ($item->tweet->isFavoritedby(Auth::user()))
                <span class="mr-8"><a href="{{ route('tweets.unfavorite', $item->tweet) }}"
                        class="text-grey-dark hover:no-underline hover:text-blue-light"><i
                            class="fa fa-bookmark fa-lg mr-2 text-red-700"></i>{{ $tweet->favoriters()->count() }}
                    </a></span>
            @else
                <span class="mr-8"><a href="{{ route('tweets.favorite', $item->tweet) }}"
                        class="text-grey-dark hover:no-underline hover:text-blue-light"><i
                            class="fa fa-bookmark fa-lg mr-2"></i>{{ $item->tweet->favoriters()->count() }}
                    </a></span>
            @endif

            {{-- Retweet --}}

            <span class="mr-8"><a href="{{ route('feeds.retweet', $item->tweet) }}"
                    class="text-grey-dark hover:no-underline hover:text-green"><i class="fa fa-retweet fa-lg mr-2"></i>
                    RT</a></span>

            <span class="mr-8"><a href="{{ route('feeds.unretweet', $item->tweet) }}"
                    class="text-grey-dark hover:no-underline hover:text-green"><i class="fa fa-retweet fa-lg mr-2"></i>
                    UnRT</a></span>

            {{-- Like --}}
            @if ($item->tweet->isLikedby(Auth::user()))
                <span class="mr-8"><a href="{{ route('tweets.unlike', $item->tweet) }}"
                        class="text-grey-dark hover:no-underline hover:text-red"><i
                            class="fa fa-heart fa-lg mr-2 text-red-700"></i><a
                            href="{{ route('tweets.likers', $item->tweet) }}">
                            {{ $item->tweet->likers()->count() }}</a></a></span>
            @else
                <span class="mr-8"><a href="{{ route('tweets.like', $item->tweet) }}"
                        class="text-grey-dark hover:no-underline hover:text-red"><i @if ($item->tweet->likers()->count() > 0)
                            class="fa fa-heart fa-lg mr-2"></i><a
                            href="{{ route('tweets.likers', $item->tweet) }}">{{ $item->tweet->likers()->count() }}</a></a></span>
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
