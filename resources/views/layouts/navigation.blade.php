<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-PH8I3iGkW9TKC9a5+GIPjY7GkZ2T9wEv8WtMwJ6W5x4AfjNbt17C9AjqUZJjlB3KzPz9+6q5imwYXOW9kt47GQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Navigation</title>
    <style>
        /* Optional: Add your custom styles here */
        /* Example: */
        .bg-sky-900 {
            background-color: #2D3748;
        }

        .text-sky-900 {
            color: #2D3748;
        }
    </style>
</head>

<body class="bg-gray-900 text-white">
    <nav x-data="{ open: false }" class="bg-gray-800 text-white shadow-lg">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('home') }}" class="text-white text-xl font-bold">
                            Service Company
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <a href="{{ route('home') }}" class="text-gray-300 hover:text-white">
                            Home
                        </a>
                        <a href="{{ route('dashboard') }}" class="text-gray-300 hover:text-white">
                            Dashboard
                        </a>
                        @if(auth()->user() && auth()->user()->role == 'admin')
                        <a href="{{ route('categorydashboard.show') }}" class="text-gray-300 hover:text-white">
                            Category Dashboard
                        </a>
                        <a href="{{ route('services.show') }}" class="text-gray-300 hover:text-white">
                            Services Dashboard
                        </a>
                        @endif
                    </div>
                </div>

                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ml-6 space-x-4">
                    @auth
                    @if(auth()->user() && auth()->user()->role == 'user')
                    <div class="relative flex items-center">
                        <!-- Cart Icon -->
                        <a href="/cart" class="text-gray-300 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                            </svg>
                        </a>
                    </div>
                    <div class="relative flex items-center">
                        <a href="/favourites" class="text-gray-300 hover:text-white">
                            <img src="{{asset('fav.png')}}" class="w-8" alt="">
                        </a>
                    </div>
                    @endif
                    <!-- User Dropdown -->
                    <div x-data="{ dropdownOpen: false }" class="relative">
                        <button @click="dropdownOpen = !dropdownOpen" class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium rounded-md focus:outline-none focus:ring focus:ring-gray-300">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                        <!-- Dropdown Content -->
                        <div x-show="dropdownOpen" @click.away="dropdownOpen = false" class="absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-gray-700 text-white z-20" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-800 hover:text-white">
                                Profile
                            </a>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-800 hover:text-white" onclick="event.preventDefault(); this.closest('form').submit();">
                                    Log Out
                                </a>
                            </form>
                        </div>
                    </div>
                    @else
                    <div class="flex items-center">
                        <a href="{{ route('login') }}" class="text-sm text-gray-300 hover:text-white underline m-2">Log in</a>
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-300 hover:text-white underline">Register</a>
                    </div>
                    @endauth
                </div>

                <!-- Hamburger -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <a href="{{ route('home') }}" class="block px-3 py-2 text-base font-medium text-gray-300 hover:text-white">
                    Home
                </a>
                <a href="{{ route('dashboard') }}" class="block px-3 py-2 text-base font-medium text-gray-300 hover:text-white">
                    Dashboard
                </a>
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-700">
                <div class="px-3">
                    @auth
                    <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                    <div class="mt-1">
                        <a href="{{ route('profile.edit') }}" class="block px-3 py-2 text-sm text-gray-300 hover:bg-gray-800 hover:text-white">
                            Profile
                        </a>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" class="block px-3 py-2 text-sm text-gray-300 hover:bg-gray-800 hover:text-white" onclick="event.preventDefault(); this.closest('form').submit();">
                                Log Out
                            </a>
                        </form>
                    </div>
                    @else
                    <div class="flex items-center">
                        <a href="{{ route('login') }}" class="block px-3 py-2 text-sm text-gray-300 hover:text-white">Log in</a>
                        <a href="{{ route('register') }}" class="block px-3 py-2 text-sm text-gray-300 hover:text-white">Register</a>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
    </nav>



</body>

</html>
