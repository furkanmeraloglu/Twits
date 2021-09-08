<x-app-layout>

    @include('layouts.userMenu')


        <div class="w-full lg:w-1/2 bg-white mb-4">

            <div class="p-3 text-lg font-bold border-b border-solid border-grey-light">
                <h1 class="text-black mr-6 no-underline hover-underline">{{$user->name}} 's Followings</h1>

            </div>



            {{-- User card --}}

            @foreach ($followings as $following)

                <div class="flex border-b border-solid border-grey-light">
                    <div class="w-1/8 text-right pl-3 pt-3">

                            <div><a href="#"><img src="{{ asset('storage/' . $following->image_path) }}" alt="avatar"
                                        class="rounded-full h-12 w-12 mr-2"></a></div>

                    </div>
                    <div class="w-7/8 p-3 pl-0">

                        <div class="flex justify-between">
                            <div>
                                <span class="font-bold"><a href="{{ route('users.show', $following) }}"
                                        class="text-black">{{ $following->name }}</a></span>
                                <span class="text-grey-dark"> {{"@" . $following->nickname }}</span>

                                <span class="text-grey-dark">{{ $following->created_at }}</span>
                            </div>

                        </div>

                        <div>
                            <div class="mb-4">

                                <p class="mb-6">{{ $following->bio }}</p>

                            </div>
                        </div>

                        <div class="pb-2">
                            <div>
                                @if ($user->isFollowing($following->id))
                                    <a href="{{ route('users.unfollow', $following) }}"
                                    class="inline-flex items-center h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-500">
                                        Unfollow
                                    </a>
                                @else
                                    <a href="{{ route('users.follow', $following) }}"
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
