<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <nav x-data="{ open: false }" class="bg-gradient-to-r from-gray-900 to-sky-900 text-white">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('home') }}" class="text-white">
                            Service Company
                        </a>
                    </div>                
    
                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex text-white">
                        <x-nav-link :href="route('home')" :active="request()->routeIs('home')" class="text-white">
                            {{ __('Home') }}
                        </x-nav-link>
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        @if(auth()->user() && auth()->user()->role == 'admin')    
                        <x-nav-link :href="route('categorydashboard.show')" :active="request()->routeIs('categorydashboard.show')" class="text-white">
                            {{ __('Category Dashboard') }}
                        </x-nav-link>
                        <x-nav-link :href="route('services.show')" :active="request()->routeIs('services.show')" class="text-white">
                            {{ __('Services Dashboard') }}
                        </x-nav-link>
                        @endif
                    </div>
                </div>
    
                <!-- Settings Dropdown -->  
                <div class="hidden sm:flex sm:items-center sm:ms-6 ">
                    @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium rounded-md text-white">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
    
                        <x-slot name="content" class="bg-gradient-to-r from-gray-900 to-sky-900 ">
                            <x-dropdown-link :href="route('profile.edit')" class="text-white">
                                {{ __('Profile') }}
                            </x-dropdown-link>
    
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
    
                                <x-dropdown-link :href="route('logout')" class="text-white"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                    @else
                    <div class="flex items-center">
                        <a href="{{ route('login') }}" class="text-sm text-white underline m-2">Log in</a>
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-white underline">Register</a>
                    </div>
                    @endauth
                </div>
    
                <!-- Hamburger -->
                <div class="-me-2 flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-gray-200 hover:bg-gray-800 focus:outline-none focus:bg-gray-800 focus:text-gray-200 transition duration-150 ease-in-out">
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
                <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')" class="text-white">
                    {{ __('Home') }}
                </x-responsive-nav-link>            
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            </div>
    
            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    @auth
                    <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-400">{{ Auth::user()->email }}</div>
                    @endauth
                </div>
    
                <div class="mt-3 space-y-1">
                    @auth
                    <x-responsive-nav-link :href="route('profile.edit')" class="text-white">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>
    
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
    
                        <x-responsive-nav-link :href="route('logout')" class="text-white"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                    @else
                    <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-white hover:bg-gray-800 hover:text-gray-200">Log in</a>
                    <a href="{{ route('register') }}" class="block px-4 py-2 text-sm text-white hover:bg-gray-800 hover:text-gray-200">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
</body>
</html>
