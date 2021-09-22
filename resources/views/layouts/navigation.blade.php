<nav class="w-full lg:w-2/5">
    <a href=" {{ route('dashboard') }} "
        class="text-grey-darker text-sm mr-4 font-semibold pb-6 border-b-2 border-solid border-transparent no-underline hover:text-green-400 hover:no-underline"><i
            class="fa fa-home fa-lg"></i> Home</a>
    <a href="{{ route('tags.index') }}"
        class="text-grey-darker text-sm mr-4 font-semibold pb-6 border-b-2 border-solid border-transparent no-underline hover:text-green-400 hover:no-underline"><i
            class="fa fa-globe-europe fa-lg"></i> Explore </a>



    <a href="{{ route('tweets.getFavorites', Auth::user()) }}"
        class="text-grey-darker text-sm mr-4 font-semibold pb-6 border-b-2 border-solid border-transparent no-underline hover:text-green-400 hover:no-underline"><i
            class="fa fa-bookmark fa-lg"></i> Bookmarks </a>


</nav>
<div class="w-full lg:w-1/5 text-center my-4 lg:my-0" style="height: 75px;"><a href="{{ route('dashboard') }} "><img
            src="{{ asset('images/logo.png') }}" alt="twits!" style="width: 120px;
    height: 85px;
    padding: 0px;
    margin: auto;"></a>
</div>
<div class="w-full lg:w-2/5 flex lg:justify-end">
    <div class="mr-4 relative">

    </div>

    {{-- Notifications dropdown --}}
    <div class="hidden sm:flex sm:items-center sm:ml-6">
        @if (Auth::user()->unreadNotifications->count() > 0)
            <x-dropdown align="right" width="120px" class="w-full">
                <x-slot name="trigger">
                    <span class="text-xl tracking-tighter text-red-500">
                        <x-svg.bell class="h-7 -mr-1 w-7  align-text-top animate-bounce origin-top" />
                        <sup>{{ Auth::user()->unreadNotifications->count() }}</sup>
                    </span>



                </x-slot>
                <x-slot name="content">
                    @foreach (Auth::user()->unreadNotifications as $notification)
                        <x-dropdown-link>{{ $notification->data['comment'] }}</x-dropdown-link>
                        {{ $notification->markAsRead() }}
                    @endforeach
                </x-slot>
            </x-dropdown>
        @else
            <span class="text-xl tracking-tighter text-green-500">
                <x-svg.bell class="h-7 -mr-1 w-7  align-text-top origin-top" />
            </span>
        @endif
    </div>

    {{-- Notifications dropdown end --}}

    <!-- User Dropdown -->
    <div class="hidden sm:flex sm:items-center sm:ml-6">
        <x-dropdown align="right" width="48">

            <x-slot name="trigger">
                <img class="rounded h-10 w-10 object-cover" src="{{ asset('storage/' . Auth::user()->image_path) }}"
                    alt="logo" />
                {{-- <button

                    class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                    <div>{{ Auth::user()->name }}</div>

                    <div class="ml-1">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </button> --}}
            </x-slot>

            <x-slot name="content">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
                <x-dropdown-link href="https://quickabdest.com/" target="_blank">Help Center</x-dropdown-link>
            </x-slot>

        </x-dropdown>
    </div>
    <div><button class="bg-teal hover:bg-teal-dark text-white font-medium py-2 px-4 rounded-full">Tweet</button></div>
</div>
</div> <!-- end container -->
