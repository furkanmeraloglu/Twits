<x-app-layout>

    @include('layouts.userMenu')

    <div class="w-full lg:w-1/2 bg-white mb-4">



        {{-- Tweet section --}}

        <form action="{{ route('tweets.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <textarea id="tweet" name="content" class="w-full pt-5 resize-none border rounded-md"></textarea>
                <div class="flex">
                    <button id="tweet_button" type="submit"
                        class="inline-flex items-center h-10 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-green-400 rounded-lg focus:shadow-outline hover:bg-green-600">
                        Twit!
                    </button>
                    <div id="tweet_counter"
                        class="inline-flex items-center h-10 my-2 px-4 text-lg text-indigo-100 bg-red-400 rounded-lg focus:shadow-outline ">
                        0
                    </div>
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
