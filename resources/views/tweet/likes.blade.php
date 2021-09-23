<x-app-layout>
    @include('layouts.userMenu')


        <div class="w-full lg:w-1/2 bg-white mb-4">

            <div class="p-3 text-lg font-bold border-b border-solid border-grey-light">
                <h1 class="text-black mr-6 no-underline hover-underline">{{ $user->name }}'s Likes</h1>
            </div>


            {{-- tweet card --}}

            @foreach ($likes as $like)

                <div class="flex border-b border-solid border-grey-light">
                    <div class="w-1/8 text-right pl-3 pt-3">

                            <div><a href="#"><img src="{{ asset('storage/' . $like->likeable->user->image_path) }}"
                                        alt="avatar" class="rounded-full h-12 w-12 mr-2"></a></div>

                    </div>
                    <div class="w-7/8 p-3 pl-0">

                        <div class="flex justify-between">
                            <div>
                                <span class="font-bold"><a href="#"
                                        class="text-black">{{ $like->likeable->user->name }}</a></span>
                                <span class="text-grey-dark"> {{"@" . $like->likeable->user->nickname }}</span>

                                <span class="text-grey-dark">{{ $like->likeable->created_at }}</span>
                            </div>

                        </div>

                        <div>
                            <a href="{{ route('tweets.show', $like->likeable) }}">
                            <div class="mb-4">
                                <p class="mb-6">{{ $like->likeable->content }}</p>
                            </div>
                            </a>
                        </div>

                        <div class="pb-2">

                            {{-- Comment section --}}
                            <span class="mr-8"><a href="{{ route('tweets.add_comment', $like->likeable) }}"
                                class="text-grey-dark hover:no-underline hover:text-blue-light"><i
                                    class="fa fa-comment fa-lg mr-2"></i>
                                @if ($like->likeable->children()->count())
                                    {{ $like->likeable->children()->count() }}
                                @else
                            </a>0</span>
                                @endif

                            {{-- bookmark section --}}
                            @if ($like->likeable->isFavoritedby(Auth::user()))
                                <span class="mr-8"><a href="{{ route('tweets.unfavorite', $like->likeable) }}"
                                        class="text-grey-dark hover:no-underline hover:text-blue-light"><i
                                            class="fa fa-bookmark fa-lg mr-2 text-red-700"></i>{{ $like->likeable->favoriters()->count() }}
                                    </a></span>
                            @else
                                <span class="mr-8"><a href="{{ route('tweets.favorite', $like->likeable) }}"
                                        class="text-grey-dark hover:no-underline hover:text-blue-light"><i
                                            class="fa fa-bookmark fa-lg mr-2"></i>{{ $like->likeable->favoriters()->count() }}
                                    </a></span>
                            @endif

                            {{-- Retweet --}}
                            <span class="mr-8"><a href="{{ route('feeds.retweet', $like->likeable) }}"
                                    class="text-grey-dark hover:no-underline hover:text-green"><i
                                        class="fa fa-retweet fa-lg mr-2"></i> 29</a></span>

                            {{-- Like --}}
                            @if ($like->likeable->isLikedby(Auth::user()))
                                <span class="mr-8"><a href="{{ route('tweets.unlike', $like->likeable) }}"
                                        class="text-grey-dark hover:no-underline hover:text-red"><i
                                            class="fa fa-heart fa-lg mr-2 text-red-700"></i><a
                                            href="{{ route('tweets.likers', $like->likeable) }}">
                                            {{ $like->likeable->likers()->count() }}</a></a></span>
                            @else
                                <span class="mr-8"><a href="{{ route('tweets.like', $like->likeable) }}"
                                        class="text-grey-dark hover:no-underline hover:text-red"><i @if ($like->likeable->likers()->count() > 0)
                                            class="fa fa-heart fa-lg mr-2"></i><a
                                            href="{{ route('tweets.likers', $like->likeable) }}">{{ $like->likeable->likers()->count() }}</a></a></span>
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
