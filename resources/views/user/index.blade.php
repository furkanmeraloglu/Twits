<x-app-layout>

    @include('layouts.userMenu');


        <div class="w-full lg:w-1/2 bg-white mb-4">

            <div class="p-3 text-lg font-bold border-b border-solid border-grey-light">
                <h1 class="text-black mr-6 no-underline hover-underline">Who to Follow</h1>

            </div>

            {{-- User card --}}

            @foreach ($usersIndex as $user)

                <div class="flex border-b border-solid border-grey-light">
                    <div class="w-1/8 text-right pl-3 pt-3">

                            <div><a href="#"><img src="{{ asset('storage/' . $user->image_path) }}" alt="avatar"
                                        class="rounded-full h-12 w-12 mr-2"></a></div>

                    </div>
                    <div class="w-7/8 p-3 pl-0">

                        <div class="flex justify-between">
                            <div>
                                <span class="font-bold"><a href="#"
                                        class="text-black">{{ $user->name }}</a></span>
                                <span class="text-grey-dark"> {{"@" . $user->nickname }}</span>

                                <span class="text-grey-dark">{{ $user->created_at }}</span>
                            </div>

                        </div>

                        <div>
                            <div class="mb-4">

                                <p class="mb-6">{{ $user->bio }}</p>

                            </div>
                        </div>

                        <div class="pb-2">
                            <div>
                                @if (Auth::user()->isFollowing($user->id))
                                    <a href="{{ route('users.unfollow', $user) }}"
                                    class="inline-flex items-center h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-500">
                                        Unfollow
                                    </a>
                                @else
                                    <a href="{{ route('users.follow', $user) }}"
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
