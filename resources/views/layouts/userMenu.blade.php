    @if ($user?->bg_image_path === null)
        <div class="hero h-64 bg-cover h-112 full"
            style="background-image: url({{ asset('images/default_cover.jpg') }})">
        </div>
    @else
        <div class="hero h-64 bg-cover h-112 full"
            style="background-image: url({{ asset('storage/' . $user->bg_image_path) }})">
        </div>
    @endif

    <div class="bg-white shadow">
        <div class="container mx-auto flex flex-col lg:flex-row items-center lg:relative">
            @if ($user?->image_path !== null)
            <div class="w-full lg:w-1/4">
                {{-- avatar --}}
                <img src="{{ asset('storage/' . $user->image_path) }}" alt="logo"
                    class="rounded-full h-48 w-48 lg:absolute lg:pin-l lg:pin-t lg:-mt-24">
                    {{-- end avatar --}}
            </div>
            @endif
            @if ($user)
            <div class="w-full lg:w-1/2">
                <ul class="list-reset flex">
                    <li class="text-center py-3 px-4 border-b-2 border-solid border-transparent border-teal">
                        <a href="{{ route('tweets.index') }}" class="text-grey-darker no-underline hover:no-underline">
                            <div class="text-sm font-bold tracking-tight mb-1">Tweets</div>
                            <div class="text-lg tracking-tight font-bold text-teal">
                                {{ $user->tweets()->count() }}</div>
                        </a>
                    </li>
                    <li class="text-center py-3 px-4 border-b-2 border-solid border-transparent hover:border-teal">
                        <a href="{{ route('users.followings', $user) }}"
                            class="text-grey-darker no-underline hover:no-underline">
                            <div class="text-sm font-bold tracking-tight mb-1">Following</div>
                            <div class="text-lg tracking-tight font-bold hover:text-teal">
                                {{ $user->followings()->count() }}</div>
                        </a>
                    </li>
                    <li class="text-center py-3 px-4 border-b-2 border-solid border-transparent hover:border-teal">
                        <a href="{{ route('users.followers', $user) }}"
                            class="text-grey-darker no-underline hover:no-underline">
                            <div class="text-sm font-bold tracking-tight mb-1">Followers</div>
                            <div class="text-lg tracking-tight font-bold hover:text-teal">
                                {{ $user->followers()->count() }}</div>
                        </a>
                    </li>
                    <li class="text-center py-3 px-4 border-b-2 border-solid border-transparent hover:border-teal">
                        <a href="{{ route('tweets.getLikes', $user) }}"
                            class="text-grey-darker no-underline hover:no-underline">
                            <div class="text-sm font-bold tracking-tight mb-1">Likes</div>
                            <div class="text-lg tracking-tight font-bold hover:text-teal">
                                {{ $user->likes()->count() }}</div>
                        </a>
                    </li>
                    <li class="text-center py-3 px-4 border-b-2 border-solid border-transparent hover:border-teal">
                        <a href="{{ route('tweets.getFavorites', $user) }}"
                            class="text-grey-darker no-underline hover:no-underline">
                            <div class="text-sm font-bold tracking-tight mb-1">Favorites</div>
                            <div class="text-lg tracking-tight font-bold hover:text-teal">
                                {{ $user->favorites()->count() }}</div>
                        </a>
                    </li>
                </ul>
            </div>
            @endif
            <div class="w-full lg:w-1/4 flex my-4 lg:my-0 lg:justify-end items-center">
                <div class="mr-6">



                </div>

            </div>
        </div> <!-- end container -->

    </div>
@if ($user)
<div class="container mx-auto flex flex-col lg:flex-row mt-3 text-sm leading-normal pt-7">
    <div class="w-full lg:w-1/4 pl-4 lg:pl-0 pr-6 mt-8 mb-4">
        <h1><a href="{{ route('users.show', $user) }}" class="text-black font-bold no-underline hover:underline">{{ $user->name }}</a>
        </h1>
        <div class="mb-4"><a href="#" class="text-grey-darker no-underline hover:underline">
                {{ '@' . $user->nickname }} </a></div>

        <div class="mb-4">
            {{ Auth::user()->bio }}
        </div>

        <div class="mb-2"><i class="fa fa-link fa-lg text-grey-darker mr-1"></i><a href="#"
                class="text-teal no-underline hover:underline">{{ $user->website }}</a></div>
        <div class="mb-4"><i class="fa fa-calendar fa-lg text-grey-darker mr-1"></i><a href="#"
                class="text-teal no-underline hover:underline">Joined {{ $user->created_at }}</a></div>

        @if($user->id == Auth::user()->id)
        <a href="{{ route('users.edit', $user) }}"
            class="inline-flex items-center h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-green-400 rounded-lg focus:shadow-outline hover:bg-green-600">
            Profilini Düzenle
        </a>
        @endif


        <div class="mb-4"></div>

    </div>
@endif



