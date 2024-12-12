<nav class="bg-white shadow-lg ">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex justify-between">
            <div class="flex space-x-7">
                <!-- Website Logo -->
                <div>
                    <a href="{{ route('home') }}"  class="flex items-center py-4">
                        <img class="h-12 w-full mr-2" src="https://img.freepik.com/premium-vector/education-logo-icon-design-vector-illustration_1094201-561.jpg" alt="">
                        {{-- <span class="font-semibold text-gray-500 text-lg">Your Logo</span> --}}
                    </a>
                </div>

                <!-- Primary Navigation -->
                @if(auth()->user()->role === 'user')
                <div class="hidden md:flex items-center space-x-1">
                    {{-- <a href="#" class="py-4 px-2 text-gray-500 hover:text-gray-900 transition duration-300">Home</a>
                    <a href="#" class="py-4 px-2 text-gray-500 hover:text-gray-900 transition duration-300">About</a>
                    <a href="#" class="py-4 px-2 text-gray-500 hover:text-gray-900 transition duration-300">Services</a>
                    <a href="#" class="py-4 px-2 text-gray-500 hover:text-gray-900 transition duration-300">Contact</a> --}}
                </div>
                @else
                <div class="hidden md:flex items-center space-x-1">
                <a href="#" class="py-4 px-2 text-gray-500 hover:text-gray-900 transition duration-300">Services</a>
            </div>
            @endif

            </div>

            <!-- Secondary Navigation (Auth) -->
            <div class="hidden md:flex items-center space-x-3">
                @guest
                    <a href="{{ route('login') }}" class="py-2 px-2 font-medium text-gray-500 hover:text-gray-900 transition duration-300">Login</a>
                    <a href="{{ route('register') }}" class="py-2 px-2 font-medium text-white bg-blue-500 rounded hover:bg-blue-400 transition duration-300">Register</a>
                @else
                    <div class="relative">
                        <button id="dropdownBtn" class="flex items-center space-x-2 text-gray-500 hover:text-gray-900">
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg hidden">
                            {{-- <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a> --}}
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                        </div>
                    </div>
                @endguest
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button class="outline-none mobile-menu-button">
                    <svg class="w-6 h-6 text-gray-500 hover:text-gray-900"
                         fill="none"
                         stroke-linecap="round"
                         stroke-linejoin="round"
                         stroke-width="2"
                         viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="hidden mobile-menu md:hidden">
        <ul class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            @guest
                <li><a href="{{ route('login') }}" class="block px-2 py-4 text-sm hover:bg-gray-100">Login</a></li>
                <li><a href="{{ route('register') }}" class="block px-2 py-4 text-sm hover:bg-gray-100">Register</a></li>
            @else
                <li><a href="#" class="block px-2 py-4 text-sm hover:bg-gray-100">Profile</a></li>
                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('mobile-logout-form').submit();"
                       class="block px-2 py-4 text-sm hover:bg-gray-100">Logout</a>
                    <form id="mobile-logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </li>
            @endguest
        </ul>
    </div>
</nav>

<script>
    // Mobile menu toggle
    const btn = document.querySelector('.mobile-menu-button');
    const menu = document.querySelector('.mobile-menu');
    const btnDropdown = document.querySelector('#dropdownBtn');
    const dropdown = document.querySelector('#dropdown');

    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });

    btnDropdown.addEventListener('click', () => {
        dropdown.classList.toggle('hidden');
    });
</script>
