<x-app-layout>

    @include('layouts.userlessmenu')


        <div class="w-full lg:w-1/2 bg-white mb-4">

            <div class="p-3 text-lg font-bold border-b border-solid border-grey-light">
                

            </div>

            {{-- Tag Index Cards --}}

            @foreach ($tags as $tag)

                <div class="flex justify-between">
                    <div>
                        <p class="font-bold"><a href="{{ route('tags.show', $tag) }}" p
                                class="text-black">{{ $tag->hashtag }}</a></p>
                        <small class="text-grey-dark"> {{ $tag->tweets()->count() }} Tweets</small>
                    </div>

                </div><br>

            @endforeach

            {{ $tags->links() }}
        </div>


        

    </div>

    </body>
</x-app-layout>
