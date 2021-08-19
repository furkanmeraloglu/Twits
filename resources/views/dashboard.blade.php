<x-app-layout>

    @if (Auth::user()->bg_image_path === null)
        <div class="hero h-64 bg-cover h-112 full" style="background-image: url(https://source.unsplash.com/1500x500)">
        </div>
    @else
        <div class="hero h-64 bg-cover h-112 full"
            style="background-image: url({{ 'images/' . Auth::user()->bg_image_path }})"> </div>
    @endif

    <div class="bg-white shadow">
        <div class="container mx-auto flex flex-col lg:flex-row items-center lg:relative">
            <div class="w-full lg:w-1/4">
                {{-- avatar --}}
                @if (Auth::user()->image_path === null)
                    <img src="https://source.unsplash.com/400x400" alt="logo"
                        class="rounded-full h-48 w-48 lg:absolute lg:pin-l lg:pin-t lg:-mt-24">
                @else
                    <img src="{{ 'images/' . Auth::user()->image_path }}" alt="logo"
                        class="rounded-full h-48 w-48 lg:absolute lg:pin-l lg:pin-t lg:-mt-24">
                @endif
            </div>
            <div class="w-full lg:w-1/2">
                <ul class="list-reset flex">
                    <li class="text-center py-3 px-4 border-b-2 border-solid border-transparent border-teal">
                        <a href="#" class="text-grey-darker no-underline hover:no-underline">
                            <div class="text-sm font-bold tracking-tight mb-1">Tweets</div>
                            <div class="text-lg tracking-tight font-bold text-teal">
                                {{ Auth::user()->tweets()->count() }}</div>
                        </a>
                    </li>
                    <li class="text-center py-3 px-4 border-b-2 border-solid border-transparent hover:border-teal">
                        <a href="#" class="text-grey-darker no-underline hover:no-underline">
                            <div class="text-sm font-bold tracking-tight mb-1">Following</div>
                            <div class="text-lg tracking-tight font-bold hover:text-teal">
                                {{ Auth::user()->followings()->count() }}</div>
                        </a>
                    </li>
                    <li class="text-center py-3 px-4 border-b-2 border-solid border-transparent hover:border-teal">
                        <a href="#" class="text-grey-darker no-underline hover:no-underline">
                            <div class="text-sm font-bold tracking-tight mb-1">Followers</div>
                            <div class="text-lg tracking-tight font-bold hover:text-teal">
                                {{ Auth::user()->followers()->count() }}</div>
                        </a>
                    </li>
                    <li class="text-center py-3 px-4 border-b-2 border-solid border-transparent hover:border-teal">
                        <a href="#" class="text-grey-darker no-underline hover:no-underline">
                            <div class="text-sm font-bold tracking-tight mb-1">Likes</div>
                            <div class="text-lg tracking-tight font-bold hover:text-teal">
                                {{ Auth::user()->likes()->count() }}</div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="w-full lg:w-1/4 flex my-4 lg:my-0 lg:justify-end items-center">
                <div class="mr-6">
                    <button
                        class="bg-teal hover:bg-teal-dark text-black font-medium py-2 px-4 rounded-full">Following</button>
                </div>

            </div>
        </div> <!-- end container -->

    </div>

    <div class="container mx-auto flex flex-col lg:flex-row mt-3 text-sm leading-normal pt-7">
        <div class="w-full lg:w-1/4 pl-4 lg:pl-0 pr-6 mt-8 mb-4">
            <h1><a href="#" class="text-black font-bold no-underline hover:underline">{{ Auth::user()->name }}</a>
            </h1>
            <div class="mb-4"><a href="#"
                    class="text-grey-darker no-underline hover:underline">@'{{ Auth::user()->nickname }}' </a></div>

            <div class="mb-4">
                {{ Auth::user()->bio }}
            </div>

            <div class="mb-2"><i class="fa fa-link fa-lg text-grey-darker mr-1"></i><a href="#"
                    class="text-teal no-underline hover:underline">{{ Auth::user()->website }}</a></div>
            <div class="mb-4"><i class="fa fa-calendar fa-lg text-grey-darker mr-1"></i><a href="#"
                    class="text-teal no-underline hover:underline">Joined {{ Auth::user()->created_at }}</a></div>


            <div class="mb-4"></div>

        </div>


        <div class="w-full lg:w-1/2 bg-white mb-4">

            <div class="p-3 text-lg font-bold border-b border-solid border-grey-light">
                <a href="#" class="text-black mr-6 no-underline hover-underline">Tweets</a>
                <a href="#" class="mr-6 text-teal no-underline hover:underline">Tweets &amp; Replies</a>
            </div>


            {{-- tweet card --}}

            @foreach ($tweets as $tweet)

                <div class="flex border-b border-solid border-grey-light">
                    <div class="w-1/8 text-right pl-3 pt-3">
                        @if ($tweet->user->image_path === null)
                            <div><a href="#"><img src="https://source.unsplash.com/400x400" alt="avatar"
                                        class="rounded-full h-12 w-12 mr-2"></a></div>
                        @else
                            <div><a href="#"><img src="{{ $tweet->user->image_path }}" alt="avatar"
                                        class="rounded-full h-12 w-12 mr-2"></a></div>
                        @endif
                    </div>
                    <div class="w-7/8 p-3 pl-0">

                        <div class="flex justify-between">
                            <div>
                                <span class="font-bold"><a href="#"
                                        class="text-black">{{ $tweet->user->name }}</a></span>
                                <span class="text-grey-dark">@'{{ $tweet->user->nickname }}'</span>

                                <span class="text-grey-dark">{{ $tweet->created_at }}</span>
                            </div>

                        </div>

                        <div>
                            <div class="mb-4">

                                <p class="mb-6">{{ $tweet->content }}</p>

                            </div>
                        </div>

                        <div class="pb-2">
                            <span class="mr-8"><a href="#"
                                    class="text-grey-dark hover:no-underline hover:text-blue-light"><i
                                        class="fa fa-comment fa-lg mr-2"></i> 9</a></span>
                            <span class="mr-8"><a href="#" class="text-grey-dark hover:no-underline hover:text-green"><i
                                        class="fa fa-retweet fa-lg mr-2"></i> 29</a></span>
                            <span class="mr-8"><a href="#" class="text-grey-dark hover:no-underline hover:text-red"><i
                                        class="fa fa-heart fa-lg mr-2"></i> 135</a></span>

                        </div>
                    </div>
                </div>

                {{-- tweet card end --}}
            @endforeach






        </div>

        <div class="w-full lg:w-1/4 pl-4">
            <div class="bg-white p-3 mb-3">
                <div>
                    <span class="text-lg font-bold">Who to follow</span>

                </div>
                @foreach ($users as $user)
                    <div class="flex border-b border-solid border-grey-light">
                        <div class="py-2">
                            @if ($user->image_path === null)
                                <div><a href="{{ route('users.show', $user) }}"><img
                                            src="https://source.unsplash.com/400x400" alt="avatar"
                                            class="rounded-full h-12 w-12 mr-2"></a></div>
                            @else
                                <div><a href="{{ route('users.show', $user) }}"><img
                                            src="{{ 'images/' . $user->image_path }}" alt="avatar"
                                            class="rounded-full h-12 w-12 mr-2"></a></div>
                            @endif
                        </div>
                        <div class="pl-2 py-2 w-full">
                            <div class="flex justify-between mb-1">
                                <div>
                                    <a href="{{ route('users.show', $user) }}"
                                        class="font-bold text-black">{{ $user->name }}</a> <a href="#"
                                        class="text-grey-dark">@'{{ $user->nickname }}'</a>
                                </div>

                                <div>

                                </div>
                            </div>
                            <div>
                                @if (Auth::user()->isFollowing($user->id))
                                    <button href="{{ route('users.unfollow', $user) }}"
                                        class="bg-transparent text-xs hover:bg-teal text-teal font-semibold hover:text-grey-400 py-2 px-6 border border-teal hover:border-transparent rounded-full">
                                        Unfollow
                                    </button>
                                @else
                                    <button href="{{ route('users.follow', $user) }}"
                                        class="bg-transparent text-xs hover:bg-teal text-teal font-semibold hover:text-grey-400 py-2 px-6 border border-teal hover:border-transparent rounded-full">
                                        Follow
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach


                <div class="flex  ">
                    <div class="py-4">

                    </div>
                    <div class="pl-2 py-2 w-full">
                        <div class="flex justify-between">

                        </div>
                    </div>

                    <div class="pt-2">

                    </div>
                </div>

                <div class="bg-white p-3 mb-3">
                    <div class="mb-3">
                        <span class="text-lg font-bold">Trends for you</span>

                    </div>

                    <div class="mb-3 leading-tight">
                        <div><a href="#" class="text-teal font-bold">Happy New Year</a></div>
                        <div><a href="#" class="text-grey-dark text-xs">645K Tweets</a></div>
                    </div>

                    <div class="mb-3 leading-tight">
                        <div><a href="#" class="text-teal font-bold">Happy 2018</a></div>
                        <div><a href="#" class="text-grey-dark text-xs">NYE 2018 Celebrations</a></div>
                    </div>

                    <div class="mb-3 leading-tight">
                        <div><a href="#" class="text-teal font-bold">#ByeBye2017</a></div>
                        <div><a href="#" class="text-grey-dark text-xs">21.7K Tweets</a></div>
                    </div>

                    <div class="mb-3 leading-tight">
                        <div><a href="#" class="text-teal font-bold">#SomeHashTag</a></div>
                        <div><a href="#" class="text-grey-dark text-xs">45K Tweets</a></div>
                    </div>

                    <div class="mb-3 leading-tight">
                        <div><a href="#" class="text-teal font-bold">Something Trending</a></div>
                        <div><a href="#" class="text-grey-dark text-xs">36K Tweets</a></div>
                    </div>

                    <div class="mb-3 leading-tight">
                        <div><a href="#" class="text-teal font-bold">#ColdAF</a></div>
                        <div><a href="#" class="text-grey-dark text-xs">100K Tweets</a></div>
                    </div>

                </div>

                <div class="mb-3 text-xs">
                    <span class="mr-2"><a href="#" class="text-grey-darker">&copy; 2021 Twitter</a></span>
                    <span class="mr-2"><a href="#" class="text-grey-darker">About</a></span>
                    <span class="mr-2"><a href="#" class="text-grey-darker">Help Center</a></span>
                    <span class="mr-2"><a href="#" class="text-grey-darker">Terms</a></span>
                    <span class="mr-2"><a href="#" class="text-grey-darker">Privacy policy</a></span>
                    <span class="mr-2"><a href="#" class="text-grey-darker">Cookies</a></span>
                    <span class="mr-2"><a href="#" class="text-grey-darker">Ads info</a></span>
                </div>
            </div>

        </div>

        </body>
</x-app-layout>
