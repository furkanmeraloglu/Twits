<x-app-layout>

    @include('layouts.userMenu')

    <div class="w-full lg:w-1/2 bg-white mb-4">

        <div class="p-3 text-lg font-bold border-b border-solid border-grey-light">
            <a href="{{ route('tweets.index') }}" class="text-black mr-6 no-underline hover-underline">Tweets</a>
            <a href="#" class="mr-6 text-teal no-underline hover:underline">Tweets &amp; Replies</a>
            <a href="#" class="mr-6 text-teal no-underline hover:underline">Retweets</a>
        </div>

        {{-- Tweet section --}}

        <form action="{{ route('tweets.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <textarea id="tweet" name="content" class="w-full pt-5 resize-none border rounded-md"></textarea>
                <div class="flex">
                    <button id="tweet_button" type="submit"
                        class="inline-flex items-center h-10 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-green-400 rounded-lg focus:shadow-outline hover:bg-green-600">
                        Tweet!
                    </button>
                    <p id="tweet_counter" class="text-xs text-gray-600">0</p>
                </div>
            </div>
        </form>

        {{-- Tweet section end --}}

        {{-- tweet card --}}

        @include('layouts.tweetCard')

        {{-- tweet card end--}}

        @include('layouts.rightmenu')

    </div>

    </body>
</x-app-layout>
