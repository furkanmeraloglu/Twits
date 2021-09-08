<x-app-layout>

    @include('layouts.userMenu')


        <div class="w-full lg:w-1/2 bg-white mb-4">

            <div class="p-3 text-lg font-bold border-b border-solid border-grey-light">

            </div>


            {{-- tweet card --}}

    @include('layouts.tweetCard')

            {{-- tweet card end--}}

    @include('layouts.rightmenu')

    </div>

    </body>
</x-app-layout>
