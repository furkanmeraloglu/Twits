<div class= "w-full">
<!-- Code block starts -->
<nav aria-label="nav bar" tabindex="0" class="focus:outline-none w-full bg-white xl:block shadow">
    <div class="container px-6 h-16 flex justify-between items-center lg:items-stretch mx-auto">
        <div class="flex items-center">
            <div tabindex="0" class="focus:outline-none mr-10 flex items-center">
                <img class="max-h-auto"src="{{ asset('storage/logo.jpg') }}" alt="Twits!">
            </div>
            <div class="hidden xl:flex items-center h-full">
                <a href="javascript:void(0)"
                    class="h-full flex items-center text-sm hover:text-indigo-700 focus:text-indigo-700 text-grey-500 focus:outline-none tracking-normal transition duration-150 ease-in-out">
                    <span class="mr-2">
                        <i class="fa fa-home fa-lg"></i>
                    </span>
                    Home
                </a>
                <a href="javascript:void(0)"
                    class="focus:text-indigo-700 focus:outline-none h-full flex items-center text-sm hover:text-indigo-700 text-grey-500 mx-10 tracking-normal transition duration-150 ease-in-out">
                    <span class="mr-2">
                        <i class="fa fa-globe-europe fa-lg"></i>
                    </span>
                    Explore
                </a>
                <a href="javascript:void(0)"
                    class="focus:text-indigo-700 focus:outline-none h-full flex items-center text-sm hover:text-indigo-700 text-grey-500 mr-10 tracking-normal transition duration-150 ease-in-out">
                    <span class="mr-2">
                        <i class="fa fa-bookmark fa-lg"></i>
                    </span>
                    Bookmarks
                </a>
                
            </div>
        </div>
        <div class="h-full hidden xl:flex items-center justify-end">
           
                </div>
                <div
                    class="w-20 h-full flex items-center justify-center ">
                    
                </div>
                <div
                    class="w-20 h-full flex items-center justify-center border-r border-gray-700 cursor-pointer text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" tabindex="0"
                        class="focus:outline-none focus:text-indigo-700 icon icon-tabler icon-tabler-bell" width="28"
                        height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <path
                            d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                        <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
                    </svg>
                </div>
                <button tabindex="0"
                    class="text-grey-500 focus:text-indigo-700 focus:outline-none flex items-center pl-8 relative cursor-pointer"
                    onclick="dropdownHandler(this)">
                    <ul class="p-2 w-40 border-r bg-white absolute rounded left-0 shadow mt-16 top-0 hidden">
                        <li
                            class="cursor-pointer text-gray-600 text-sm leading-3 tracking-normal py-2 hover:text-indigo-700 focus:text-indigo-700 focus:outline-none">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user"
                                    width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <circle cx="12" cy="7" r="4" />
                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                </svg>
                                <span tabindex="0" class="focus:outline-none focus:text-indigo-700 ml-2">My
                                    Profile</span>
                            </div>
                        </li>
                        <li
                            class="cursor-pointer text-gray-600 text-sm leading-3 tracking-normal mt-2 py-2 hover:text-indigo-700 focus:text-indigo-700 focus:outline-none flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-help" width="20"
                                height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <circle cx="12" cy="12" r="9" />
                                <line x1="12" y1="17" x2="12" y2="17.01" />
                                <path d="M12 13.5a1.5 1.5 0 0 1 1 -1.5a2.6 2.6 0 1 0 -3 -4" />
                            </svg>
                            <span tabindex="0" class="focus:outline-none focus:text-indigo-700 ml-2">Help Center</span>
                        </li>
                        <li
                            class="cursor-pointer text-gray-600 text-sm leading-3 tracking-normal mt-2 py-2 hover:text-indigo-700 flex items-center focus:text-indigo-700 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings"
                                width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <path
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <circle cx="12" cy="12" r="3" />
                            </svg>
                            <span tabindex="0" class="focus:outline-none focus:text-indigo-700 ml-2">Log Out</span>
                        </li>
                    </ul>
                    <img class="rounded h-10 w-10 object-cover"
                        src="{{ asset('storage/' . Auth::user()->image_path) }}"
                        alt="logo" />
                    <p class=" text-sm ml-2">{{ Auth::user()->name }}</p>
                </button>
            </div>
        </div>
        
</nav>
</div>

<script>
    function dropdownHandler(element) {
        let single = element.getElementsByTagName("ul")[0];
        single.classList.toggle("hidden");
    }

    function MenuHandler(el, val) {
        let MainList = el.parentElement.parentElement.getElementsByTagName("ul")[0];
        let closeIcon = el.parentElement.parentElement.getElementsByClassName("close-m-menu")[0];
        let showIcon = el.parentElement.parentElement.getElementsByClassName("show-m-menu")[0];
        if (val) {
            MainList.classList.remove("hidden");
            el.classList.add("hidden");
            closeIcon.classList.remove("hidden");
        } else {
            showIcon.classList.remove("hidden");
            MainList.classList.add("hidden");
            el.classList.add("hidden");
        }
    }

    // ------------------------------------------------------
    let sideBar = document.getElementById("mobile-nav");
    let menu = document.getElementById("menu");
    let cross = document.getElementById("cross");
    const sidebarHandler = (check) => {
        if (check) {
            sideBar.style.transform = "translateX(0px)";
            menu.classList.add("hidden");
            cross.classList.remove("hidden");
        } else {
            sideBar.style.transform = "translateX(-100%)";
            menu.classList.remove("hidden");
            cross.classList.add("hidden");
        }
    };
</script>
<!-- Sidebar ends -->
