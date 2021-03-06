<div class="w-full lg:w-1/4 pl-4">
    <div class="bg-white p-3 mb-3">
        <div>
            <span class="text-lg font-bold"><a href="{{ route('users.index') }}">Who to follow</a></span>
        </div>
        @foreach ($suggestedUsers as $user)
            <div class="flex border-b border-solid border-grey-light">
                <div class="py-2">
                        <div><a href="{{ route('users.show', $user) }}"><img
                                    src="{{ asset('storage/' . $user->image_path) }}" alt="avatar"
                                    class="rounded-full h-12 w-12 mr-2"></a></div>
                </div>
                <div class="pl-2 py-2 w-full">
                    <div class="flex justify-between mb-1">
                        <div>
                            <a href="{{ route('users.show', $user) }}"
                                class="font-bold text-black">{{ $user->name }}</a> <a href="#"
                                class="text-grey-dark"> {{"@" . $user->nickname }} </a>
                        </div>

                        <div>

                        </div>
                    </div>
                    <div>
                        @if (Auth::user()->isFollowing($user->id))
                            <a href="{{ route('users.unfollow', $user) }}"
                            class="inline-flex items-center h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-green-400 rounded-lg focus:shadow-outline hover:bg-green-600">
                                Unfollow
                            </a>
                        @else
                            <a href="{{ route('users.follow', $user) }}"
                            class="inline-flex items-center h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-green-400 rounded-lg focus:shadow-outline hover:bg-green-600">
                                Follow
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach

        <div class="bg-white p-3 mb-3">
            <div class="mb-3">
                <a href="{{ route('tags.index') }}">
                    <span class="text-lg font-bold">Trends for you</span>
                </a>
            </div>
            @foreach ($rightMenuTags as $tag)
            <div class="mb-3 leading-tight">
                <div><a href="{{ route('tags.show', $tag) }}" class="text-teal font-bold">{{$tag->hashtag}}</a></div>
                <div><a href="{{ route('tags.show', $tag) }}" class="text-grey-dark text-xs">{{ $tag->tweets->count() }} Twits </a></div>
            </div>

            @endforeach

        </div>

        <div class="mb-3 text-xs">
            <span class="mr-2"><a href="https://github.com/furkanmeraloglu/baby-twitter/blob/main/LICENSE.txt" class="text-grey-darker" target="_blank">Twits Have MIT Licence</a></span>
            <span class="mr-2"><a href="https://github.com/furkanmeraloglu/baby-twitter" class="text-grey-darker" target="_blank">Github</a></span>
            <span class="mr-2"><a href="https://quickabdest.com/" class="text-grey-darker" target="_blank">Help Center</a></span>

        </div>
    </div>
