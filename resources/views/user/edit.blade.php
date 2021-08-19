<x-app-layout>

    @if (Auth::user()->bg_image_path === null)
        <div class="hero h-64 bg-cover h-112 full" style="background-image: url(https://source.unsplash.com/1500x500)">
        </div>
    @else
        <div class="hero h-64 bg-cover h-112 full"
            style="background-image: url({{ 'images/' . Auth::user()->bg_image_path }})"> </div>
    @endif

    <div class="bg-white shadow">
        <div class="container mx-auto flex flex-col lg:flex-row items-center lg:relative">
            <div class="w-full lg:w-1/4">
                {{-- avatar --}}
                @if (Auth::user()->image_path === null)
                    <img src="https://source.unsplash.com/400x400" alt="logo"
                        class="rounded-full h-48 w-48 lg:absolute lg:pin-l lg:pin-t lg:-mt-24">
                @else
                    <img src="{{ 'images/' . Auth::user()->image_path }}" alt="logo"
                        class="rounded-full h-48 w-48 lg:absolute lg:pin-l lg:pin-t lg:-mt-24">
                @endif
            </div>
            <div class="w-full lg:w-1/2">
                <ul class="list-reset flex">
                    <li class="text-center py-3 px-4 border-b-2 border-solid border-transparent border-teal">
                        <a href="{{ route('tweets.index') }}"
                            class="text-grey-darker no-underline hover:no-underline">
                            <div class="text-sm font-bold tracking-tight mb-1">Tweets</div>
                            <div class="text-lg tracking-tight font-bold text-teal">
                                {{ Auth::user()->tweets()->count() }}</div>
                        </a>
                    </li>
                    <li class="text-center py-3 px-4 border-b-2 border-solid border-transparent hover:border-teal">
                        <a href="#" class="text-grey-darker no-underline hover:no-underline">
                            <div class="text-sm font-bold tracking-tight mb-1">Following</div>
                            <div class="text-lg tracking-tight font-bold hover:text-teal">
                                {{ Auth::user()->followings()->count() }}</div>
                        </a>
                    </li>
                    <li class="text-center py-3 px-4 border-b-2 border-solid border-transparent hover:border-teal">
                        <a href="#" class="text-grey-darker no-underline hover:no-underline">
                            <div class="text-sm font-bold tracking-tight mb-1">Followers</div>
                            <div class="text-lg tracking-tight font-bold hover:text-teal">
                                {{ Auth::user()->followers()->count() }}</div>
                        </a>
                    </li>
                    <li class="text-center py-3 px-4 border-b-2 border-solid border-transparent hover:border-teal">
                        <a href="#" class="text-grey-darker no-underline hover:no-underline">
                            <div class="text-sm font-bold tracking-tight mb-1">Likes</div>
                            <div class="text-lg tracking-tight font-bold hover:text-teal">
                                {{ Auth::user()->likes()->count() }}</div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="w-full lg:w-1/4 flex my-4 lg:my-0 lg:justify-end items-center">
                <div class="mr-6">



                </div>

            </div>
        </div> <!-- end container -->

    </div>

    <div class="container mx-auto flex flex-col lg:flex-row mt-3 text-sm leading-normal pt-7">
        <div class="w-full lg:w-1/4 pl-4 lg:pl-0 pr-6 mt-8 mb-4">
            <h1><a href="#" class="text-black font-bold no-underline hover:underline">{{ Auth::user()->name }}</a>
            </h1>
            <div class="mb-4"><a href="#"
                    class="text-grey-darker no-underline hover:underline">@ {{ Auth::user()->nickname }}</a></div>

            <div class="mb-4">
                {{ Auth::user()->bio }}
            </div>

            <div class="mb-2"><i class="fa fa-link fa-lg text-grey-darker mr-1"></i><a href="#"
                    class="text-teal no-underline hover:underline">{{ Auth::user()->website }}</a></div>
            <div class="mb-4"><i class="fa fa-calendar fa-lg text-grey-darker mr-1"></i><a href="#"
                    class="text-teal no-underline hover:underline">Joined {{ Auth::user()->created_at }}</a></div>

            <a href="{{ route('users.edit', Auth::user()) }}"
                class="inline-flex items-center h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-500">
                Profilini Düzenle
            </a>


            <div class="mb-4"></div>

        </div>


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
                            class="px-4 py-2 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Update</button>
                    </div>
                </div>
            </form>
            {{-- Edit Section end --}}
        </div>

        @include('layouts.rightmenu')

    </div>

    </body>

</x-app-layout>
