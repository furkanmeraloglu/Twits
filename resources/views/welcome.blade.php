<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Twits</title>
</head>
<body>

    <main class="h-full flex items-center px-6 lg:px-32 bg-blue-400 text-white">
        
        <header class="w-full absolute left-0 top-0 p-6 lg:p-32">
            <div class="flex justify-center">
                
              

              <div>
                @if (Route::has('login'))
                @auth

                <ul class="flex">
                    <li class="ml-24">
                      <a href="{{ url('/dashboard') }}">
                        <div class="flex items-center justify-end">
                          <div class="w-10 border-b border-solid border-white"></div>
                            <h1 class="ml-3 text-3xl font-bold">W</h1>
                        </div>
                        <div class="text-right">Welcome Back <span class="text-blue-900">{{ Auth::user()->name }}</span></div>
                      </a>
                    </li>
                
                @else

                <ul class="flex">
                  <li class="ml-24">
                    <a href="{{ route('login') }}">
                      <div class="flex items-center justify-end">
                        <div class="w-10 border-b border-solid border-white"></div>
                          <h1 class="ml-3 text-3xl font-bold">L</h1>
                      </div>
                      <div class="text-right">Login</div>
                    </a>
                  </li>
                  @if (Route::has('register'))
                  <li class="ml-24">
                    <a href="{{ route('register') }}">
                      <div class="flex items-center justify-end">
                        <div class="w-10 border-b border-solid border-white"></div>
                          <h1 class="ml-3 text-3xl font-bold">R</h1>
                      </div>
                      <div class="text-right">Register</div>
                    </a>
                  </li>
                  @endif
                  @endauth
                  @endif 
            </div>
        </header>

       
        
        <section class="w-full md:w-9/12 xl:w-8/12">
        <span class="font-bold uppercase tracking-widest">Twit Your Way!</span>
          <h1 class="text-5xl lg:text-7xl font-bold text-blue-900">
            Welcome to <br>
            Twits
          </h1>
        </section>

        <footer class="absolute right-0 bottom-0 p-6 lg:p-32">
            <p class="font-bold mb-1">Creators</p>
            <p>Furkan Meraloğlu & Yunus Emre Altanay</p>
          </footer>

      </main>

    
</body>
</html>