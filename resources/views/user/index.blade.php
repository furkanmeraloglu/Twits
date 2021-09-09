<x-app-layout>

    @include('layouts.userlessmenu');

    {{ $usersIndex->links() }}
    <div class="grid grid-rows-4 grid-flow-col w-full bg-white">



        {{-- User card --}}

        @foreach ($usersIndex as $user)


            <div class="bg-white rounded-lg mb-3 pl-1 shadow-xl w-full md:flex">
                <img src="{{ asset('storage/' . $user->image_path) }}"
                    class="md:w-1/3 rounded-t-lg md:rounded-t-none md:rounded-l-lg object-cover">
                <div class="p-6 min-h-full flex flex-col">
                    <h2 class="flex-none font-bold text-2xl md:text-xl text-gray-800 hover:text-gray-700 mb-2"><a
                            href="{{ route('users.show', $user) }}">{{ $user->name }}</a></h2>
                    <span class="text-grey-dark"> {{ '@' . $user->nickname }}</span>

                    <span class="text-grey-dark">{{ $user->created_at->diffForHumans() }}</span>
                    <p class="flex-none text-gray-600 mb-2"> {{ $user->bio }} </p>
                    <div class="mt-5 h-full flex flex-col justify-end items-end">
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
        @endforeach
    </div>
    </div>

    </body>
</x-app-layout>
