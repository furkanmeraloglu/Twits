<x-app-layout>
    
    @include('layouts.userMenu')


        <div class="w-full lg:w-1/2 bg-white mb-4">

            <div class="p-3 text-lg font-bold border-b border-solid border-grey-light">
                <a href="{{ route('tweets.index') }}" class="text-black mr-6 no-underline hover-underline">Tweets</a>
                <a href="#" class="mr-6 text-teal no-underline hover:underline">Tweets &amp; Replies</a>
                <a href="#" class="mr-6 text-teal no-underline hover:underline">Retweets</a>
            </div>
           


            {{-- Edit section --}}
            <form action="{{ route('users.update', $user) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mt-6 ">
                    <div class="items-center -mx-2 md:flex">
                        <div class="w-full mx-2">
                            <label for="nickname"
                                class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200">Nickname</label>

                            <input name="nickname"
                                class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                                type="text">
                        </div>

                        <div class="w-full mx-2 mt-4 md:mt-0">
                            <label for="website"
                                class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200">Web
                                Address</label>

                            <input name="website"
                                class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                                type="text">
                        </div>
                    </div>

                    <div class="w-full mt-4">
                        <label for="bio"
                            class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200">Bio</label>

                        <textarea name="bio"
                            class="resize-none block w-full h-40 px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"></textarea>
                    </div>
                    <div class="pt-5">
                        <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200">Avatar</label>
                        <input type="file" class="form-control-file" id="file_avatar" name="avatar" accept="image/*">
                    </div>
                    <div class="pt-5">
                        <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200">Background
                            Image</label>
                        <input type="file" class="form-control-file" id="file_bg" name="bgimg" accept="image/*">
                    </div>
                    <div class="flex justify-center mt-6">
                        <button type="submit"
                            class="px-4 py-2 text-white transition-colors duration-200 transform bg-green-400 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Update</button>
                    </div>
                </div>
            </form>
            {{-- Edit Section end --}}
        </div>

        @include('layouts.rightmenu')

    </div>

    </body>

</x-app-layout>
