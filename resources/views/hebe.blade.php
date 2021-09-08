
  <!-- Settings Dropdown -->
  <div class="hidden sm:flex sm:items-center sm:ml-6">
    <x-dropdown align="right" width="48">
        <x-slot name="trigger">
            <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                <div>{{ Auth::user()->name }}</div>

                <div class="ml-1">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
            </button>
        </x-slot>

        <x-slot name="content">
            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-dropdown-link>
            </form>
        </x-slot>
    </x-dropdown>
</div>



<form method="POST" action="{{ route('logout') }}">
    @csrf

    <a href="route('logout')"
    onclick="event.preventDefault();
                this.closest('form').submit();">{{ __('Log Out') }}</a> 






{{-- rtweeted tweet card --}}

<div class="flex border-b border-solid border-grey-light">

    <div class="w-1/8 text-right pl-3 pt-3">
        <div><i class="fa fa-retweet text-grey-dark mr-2"></i></div>
        <div><a href="#"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/tt_avatar_adam.jpg" alt="avatar" class="rounded-full h-12 w-12 mr-2"></a></div>
    </div>

    <div class="w-7/8 p-3 pl-0">
        <div class="text-xs text-grey-dark">Tailwind CSS Retweeted</div>
        <div class="flex justify-between">
            <div>
                <span class="font-bold"><a href="#" class="text-black">Adam Wathan</a></span>
                <span class="text-grey-dark">@adamwathan</span>
                <span class="text-grey-dark">&middot;</span>
                <span class="text-grey-dark">7 Dec 2017</span>
            </div>
            <div>
                <a href="#" class="text-grey-dark hover:text-teal"><i class="fa fa-chevron-down"></i></a>
            </div>
        </div>
        <div>
            <div class="mb-4">
                <p class="mb-6">💥 Check out this Slack clone built with <a href="#" class="text-teal">@tailwindcss</a> using no custom CSS and just the default configuration:</p>
                <p class="mb-4"><a href="#" class="text-teal">https://codepen.io/adamwathan/pen/JOQWVa...</a></p>
                <p class="mb-6">(based on some work <a href="#" class="text-teal">@Killgt</a> started for <a href="#" class="text-teal">tailwindcomponents.com</a> !)</p>
                <p><a href="#"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/tt_tweet2.jpg" alt="tweet image" class="border border-solid border-grey-light rounded-sm"></a></p>
            </div>
            <div class="pb-2">
                <span class="mr-8"><a href="#" class="text-grey-dark hover:no-underline hover:text-blue-light"><i class="fa fa-comment fa-lg mr-2"></i> 19</a></span>
                <span class="mr-8"><a href="#" class="text-grey-dark hover:no-underline hover:text-green"><i class="fa fa-retweet fa-lg mr-2"></i> 56</a></span>
                <span class="mr-8"><a href="#" class="text-grey-dark hover:no-underline hover:text-red"><i class="fa fa-heart fa-lg mr-2"></i> 247</a></span>
                <span class="mr-8"><a href="#" class="text-grey-dark hover:no-underline hover:text-teal"><i class="fa fa-envelope fa-lg mr-2"></i></a></span>
            </div>

            <div><a href="#" class="text-teal">Show this thread</a></div>
        </div>
    </div>
</div>










@if ($user()->bg_image_path === null)
        <div class="hero h-64 bg-cover h-112 full"
            style="background-image: url({{ asset('storage/' . 'default_cover.jpg') }})">
        </div>
    @else
        <div class="hero h-64 bg-cover h-112 full"
            style="background-image: url({{ asset('storage/' . $user()->bg_image_path) }})"> </div>
    @endif
    <div class="bg-white shadow">
        <div class="container mx-auto flex flex-col lg:flex-row items-center lg:relative">
            <div class="w-full lg:w-1/4">
                {{-- avatar --}}
                <img src="{{ asset('storage/' . $user()->image_path) }}" alt="logo"
                    class="rounded-full h-48 w-48 lg:absolute lg:pin-l lg:pin-t lg:-mt-24">
                {{-- end avatar --}}
            </div>
            <div class="w-full lg:w-1/2">
                <ul class="list-reset flex">
                    <li class="text-center py-3 px-4 border-b-2 border-solid border-transparent border-teal">
                        <a href="{{ route('tweets.index') }}" class="text-grey-darker no-underline hover:no-underline">
                            <div class="text-sm font-bold tracking-tight mb-1">Tweets</div>
                            <div class="text-lg tracking-tight font-bold text-teal">
                                {{ $user()->tweets()->count() }}</div>
                        </a>
                    </li>
                    <li class="text-center py-3 px-4 border-b-2 border-solid border-transparent hover:border-teal">
                        <a href="{{ route('users.followings', $user()) }}"
                            class="text-grey-darker no-underline hover:no-underline">
                            <div class="text-sm font-bold tracking-tight mb-1">Following</div>
                            <div class="text-lg tracking-tight font-bold hover:text-teal">
                                {{ $user()->followings()->count() }}</div>
                        </a>
                    </li>
                    <li class="text-center py-3 px-4 border-b-2 border-solid border-transparent hover:border-teal">
                        <a href="{{ route('users.followers', $user()) }}"
                            class="text-grey-darker no-underline hover:no-underline">
                            <div class="text-sm font-bold tracking-tight mb-1">Followers</div>
                            <div class="text-lg tracking-tight font-bold hover:text-teal">
                                {{ $user()->followers()->count() }}</div>
                        </a>
                    </li>
                    <li class="text-center py-3 px-4 border-b-2 border-solid border-transparent hover:border-teal">
                        <a href="{{ route('tweets.getLikes', $user()) }}"
                            class="text-grey-darker no-underline hover:no-underline">
                            <div class="text-sm font-bold tracking-tight mb-1">Likes</div>
                            <div class="text-lg tracking-tight font-bold hover:text-teal">
                                {{ $user()->likes()->count() }}</div>
                        </a>
                    </li>
                    <li class="text-center py-3 px-4 border-b-2 border-solid border-transparent hover:border-teal">
                        <a href="{{ route('tweets.getFavorites', $user()) }}"
                            class="text-grey-darker no-underline hover:no-underline">
                            <div class="text-sm font-bold tracking-tight mb-1">Favorites</div>
                            <div class="text-lg tracking-tight font-bold hover:text-teal">
                                {{ $user()->favorites()->count() }}</div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="w-full lg:w-1/4 flex my-4 lg:my-0 lg:justify-end items-center">
                <div class="mr-6">



                </div>

            </div>
        </div> <!-- end container -->

    </div>

    <div class="container mx-auto flex flex-col lg:flex-row mt-3 text-sm leading-normal pt-7">
        <div class="w-full lg:w-1/4 pl-4 lg:pl-0 pr-6 mt-8 mb-4">
            <h1><a href="#" class="text-black font-bold no-underline hover:underline">{{ $user()->name }}</a>
            </h1>
            <div class="mb-4"><a href="#" class="text-grey-darker no-underline hover:underline">
                    {{ '@' . $user()->nickname }} </a></div>

            <div class="mb-4">
                {{ $user()->bio }}
            </div>

            <div class="mb-2"><i class="fa fa-link fa-lg text-grey-darker mr-1"></i><a href="#"
                    class="text-teal no-underline hover:underline">{{ $user()->website }}</a></div>
            <div class="mb-4"><i class="fa fa-calendar fa-lg text-grey-darker mr-1"></i><a href="#"
                    class="text-teal no-underline hover:underline">Joined {{ $user()->created_at }}</a></div>

            <a href="{{ route('users.edit', $user()) }}"
                class="inline-flex items-center h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-green-400 rounded-lg focus:shadow-outline hover:bg-blue-500">
                Profilini Düzenle
            </a>


            <div class="mb-4"></div>

        </div>