<x-app-layout>
    
    @include('layouts.userMenu')


        <div class="w-full lg:w-1/2 bg-white mb-4">

            <div class="p-3 text-lg font-bold border-b border-solid border-grey-light">
                <h1 class="text-black mr-6 no-underline hover-underline">{{ $user->name }} 's Sweet Followers</h1>

            </div>



            {{-- User card --}}

            @foreach ($followers as $follower)

                <div class="flex border-b border-solid border-grey-light">
                    <div class="w-1/8 text-right pl-3 pt-3">

                            <div><a href="#"><img src="{{ asset('storage/' . $follower->image_path) }}" alt="avatar"
                                        class="rounded-full h-12 w-12 mr-2"></a></div>

                    </div>
                    <div class="w-7/8 p-3 pl-0">

                        <div class="flex justify-between">
                            <div>
                                <span class="font-bold"><a href="#"
                                        class="text-black">{{ $follower->name }}</a></span>
                                <span class="text-grey-dark"> {{"@" . $follower->nickname }}</span>

                                <span class="text-grey-dark">{{ $follower->created_at }}</span>
                            </div>

                        </div>

                        <div>
                            <div class="mb-4">

                                <p class="mb-6">{{ $follower->bio }}</p>

                            </div>
                        </div>

                        <div class="pb-2">
                            <div>
                                @if (Auth::user()->isFollowing($follower->id))
                                    <a href="{{ route('users.unfollow', $follower) }}"
                                    class="inline-flex items-center h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-500">
                                        Unfollow
                                    </a>
                                @else
                                    <a href="{{ route('users.follow', $follower) }}"
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
