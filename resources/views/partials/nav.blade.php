<nav class="bg-gray-800 shadow-md py-2">
    <div class="container mx-auto md:px-0">
        <div class="flex items-center justify-around">
            <a class="text-white text-2xl" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <nav class="flex-1 text-right">
                <!-- Right Side Of Navbar -->
                    <!-- Authentication Links -->
                    @guest
                        <a class="text-white no-underline hover:underline hover:text-gray-300 py-3" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="text-white no-underline hover:underline hover:text-gray-300 py-3" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <span class="text-gray-300 text-sm pr-4">{{ Auth::user()->name }}  </span>  
                        {{-- Notificaciones --}}
                        <a href="{{route('notificaciones')}}" class="bg-green-500 rounded-full mr-2 px-3 py-1 font-bold text-sm text-white">
                            {{Auth::user()->unreadNotifications->count()}}
                        </a>    
                        <a class="no-underline hover:underline text-gray-300 text-sm p-3" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                        </form>
                    @endguest
                    </nav>
                </div>
            </nav>
    </div>
</nav>