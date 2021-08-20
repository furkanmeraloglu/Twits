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
                    <img src="{{ './images/' . Auth::user()->image_path }}" alt="logo"
                        class="rounded-full h-48 w-48 lg:absolute lg:pin-l lg:pin-t lg:-mt-24">
                @endif
            </div>
            <div class="w-full lg:w-1/2">
                <ul class="list-reset flex">
                    <li class="text-center py-3 px-4 border-b-2 border-solid border-transparent border-teal">
                        <a href="{{ route('tweets.index') }}"
                            class="text-grey-darker no-underline hover:no-underline">
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



                </div>

            </div>
        </div> <!-- end container -->

    </div>

    <div class="container mx-auto flex flex-col lg:flex-row mt-3 text-sm leading-normal pt-7">
        <div class="w-full lg:w-1/4 pl-4 lg:pl-0 pr-6 mt-8 mb-4">
            <h1><a href="#" class="text-black font-bold no-underline hover:underline">{{ Auth::user()->name }}</a>
            </h1>
            <div class="mb-4"><a href="#" class="text-grey-darker no-underline hover:underline">@
                    {{ Auth::user()->nickname }} </a></div>

            <div class="mb-4">
                {{ Auth::user()->bio }}
            </div>

            <div class="mb-2"><i class="fa fa-link fa-lg text-grey-darker mr-1"></i><a href="#"
                    class="text-teal no-underline hover:underline">{{ Auth::user()->website }}</a></div>
            <div class="mb-4"><i class="fa fa-calendar fa-lg text-grey-darker mr-1"></i><a href="#"
                    class="text-teal no-underline hover:underline">Joined {{ Auth::user()->created_at }}</a></div>

            <a href="{{ route('users.edit', Auth::user()) }}"
                class="inline-flex items-center h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-500">
                Profilini Düzenle
            </a>


            <div class="mb-4"></div>

        </div>


        <div class="w-full lg:w-1/2 bg-white mb-4">

            <div class="p-3 text-lg font-bold border-b border-solid border-grey-light">
                <h1 class="text-black mr-6 no-underline hover-underline">Likers</h1>
                
            </div>

            

            {{-- User card --}}

            @foreach ($likers as $liker)

                <div class="flex border-b border-solid border-grey-light">
                    <div class="w-1/8 text-right pl-3 pt-3">
                        @if ($liker->image_path === null)
                            <div><a href="#"><img src="https://source.unsplash.com/400x400" alt="avatar"
                                        class="rounded-full h-12 w-12 mr-2"></a></div>
                        @else
                            <div><a href="#"><img src="{{ 'images/' . $liker->image_path }}" alt="avatar"
                                        class="rounded-full h-12 w-12 mr-2"></a></div>
                        @endif
                    </div>
                    <div class="w-7/8 p-3 pl-0">

                        <div class="flex justify-between">
                            <div>
                                <span class="font-bold"><a href="#"
                                        class="text-black">{{ $liker->name }}</a></span>
                                <span class="text-grey-dark">@ {{ $liker->nickname }}</span>

                                <span class="text-grey-dark">{{ $liker->created_at }}</span>
                            </div>

                        </div>

                        <div>
                            <div class="mb-4">

                                <p class="mb-6">{{ $liker->bio }}</p>

                            </div>
                        </div>

                        <div class="pb-2">
                            <div>
                                @if (Auth::user()->isFollowing($liker->id))
                                    <a href="{{ route('users.unfollow', $liker) }}"
                                    class="inline-flex items-center h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-500">
                                        Unfollow
                                    </a>
                                @else
                                    <a href="{{ route('users.follow', $liker) }}"
                                    class="inline-flex items-center h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-500">
                                        Follow
                                    </a>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>

                {{-- User card end --}}
            @endforeach






        </div>

        @include('layouts.rightmenu')

    </div>

    </body>
</x-app-layout>
