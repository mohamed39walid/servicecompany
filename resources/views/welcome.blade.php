<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Home Page</title>
    <style>
        .background-container {
            position: relative;
            text-align: center;
            color: white;
        }
        .background-image {
            width: 100%;
            height: 90vh;
            object-fit: cover;
        }
        .centered-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 2em;
            font-weight: bold;
            color: white;
        }
    </style>
</head>

<body class="bg-gradient-to-r from-slate-50 to-slate-100">
    @include('layouts.navigation')

    @if (!Auth()->user())
    <div class="background-container">
        <img src="{{ asset('backgroundfornotusers.jpg') }}" alt="Background Image" class="background-image">
        <div class="centered-text">
            <h1 class="text-4xl font-bold mb-4">Welcome to Service Company</h1>
            <p class="text-lg mb-8">Your one-stop solution for all your service needs.</p>
            <a href="/register" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded transition duration-300">Get Started</a>
        </div>
    </div>

    <div class="container mx-auto text-center py-12">
        <h1 class="text-4xl font-extrabold mb-8 text-gray-800">Our Services</h1>
        <div class="flex flex-wrap justify-center gap-8">
            <div class="max-w-sm bg-white rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300">
                <div class="p-6">
                    <div class="text-6xl text-blue-500 mb-4">⚙️</div>
                    <h3 class="text-2xl font-semibold text-gray-800 mb-2">Service Title</h3>
                    <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum aliquam metus nec diam consectetur, vel faucibus mi ultrices.</p>
                </div>
            </div>
            <div class="max-w-sm bg-white rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300">
                <div class="p-6">
                    <div class="text-6xl text-green-500 mb-4">🔧</div>
                    <h3 class="text-2xl font-semibold text-gray-800 mb-2">Another Service Title</h3>
                    <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum aliquam metus nec diam consectetur, vel faucibus mi ultrices.</p>
                </div>
            </div>
            <div class="max-w-sm bg-white rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300">
                <div class="p-6">
                    <div class="text-6xl text-yellow-500 mb-4">🔨</div>
                    <h3 class="text-2xl font-semibold text-gray-800 mb-2">Yet Another Service Title</h3>
                    <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum aliquam metus nec diam consectetur, vel faucibus mi ultrices.</p>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if(auth()->user() && auth()->user()->role == 'admin')
    <div class="background-container">
        <img src="{{ asset('backgroundforadmins.jpg') }}" alt="Background Image" class="background-image">
        <header class="container mx-auto text-center py-20 centered-text text-white">
            <h1 class="text-4xl font-bold text-white mb-4">Welcome to Service Company</h1>
            <h3 class="text-2xl text-white mb-8">Your one-stop solution for all your service needs.</h3>
            <a href="/categorydashboard" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg text-sm mb-4">Category Dashboard</a>
            <a href="/servicesdashboard" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg text-sm">Services Dashboard</a>
        </header>
    </div>
@endif



    @if(Auth()->user() && (Auth()->user()->role == 'user'))
<div class="background-container">
    <img src="{{ asset('backgroundforusers.jpg') }}" alt="Background Image" class="background-image">
    <header class="container mx-auto text-center py-10 centered-text text-white">
        <h1 class="text-4xl font-bold text-white mb-4">Welcome to Service Company</h1>
        <h3 class="text-2xl text-white mb-8">Your one-stop solution for all your service needs.</h3>
        <a href="#companyservices" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg text-sm mb-8">Discover Company Services</a>
    </header>
</div>
    <div class="container mx-auto text-center py-12">
        <div class="text-3xl font-bold text-gray-700 mb-8" id="companyservices">Company Services</div>
        <div class="flex flex-wrap justify-center">
            @foreach ($services as $service)
            <div class="max-w-sm mx-4 mb-8 bg-white rounded-lg overflow-hidden shadow-md w-full sm:w-80">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl text-gray-800 mb-2">Service Name:</div>
                    <div class="font-bold text-lg text-gray-600 mb-2">{{ $service->service_name }}</div>
                    <p class="font-bold text-xl text-gray-800 mb-2">Service Description:</p>
                    <p class="font-bold text-lg text-gray-600 mb">{{ $service->service_description }}</p>
                </div>
                <div class="px-6 pt-4 pb-2 bg-gray-100">
                    @php
                    $inCart = in_array($service->id, $cart_services);
                    $inFav = in_array($service->id, $fav_services);
                    @endphp

                    @if($inCart)
                        <form action="/deletefromcart/{{ $service->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-block mb-3 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300 mr-2">Delete From Cart</button>
                        </form>
                    @else
                        <form action="/addtocart/{{ $service->id }}" method="post">
                            @csrf
                            <button type="submit" class="inline-block mb-3 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300 mr-2">Add to Cart</button>
                        </form>
                    @endif

                    @if($inFav)
                        <form action="/deletefromfav/{{ $service->id }}" method="post">
                            @csrf
                            <button type="submit" class="inline-block mb-3 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300 mr-2">Delete From Favourite</button>
                            @method('DELETE')
                        </form>
                    @else
                        <form action="/addtofav/{{ $service->id }}" method="post">
                            @csrf
                            <button type="submit" class="inline-block mb-3 bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-lg transition duration-300">Add to Favourite</button>
                        </form>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        <div class="mt-8 w-1/4 m-auto">
            {{ $services->links() }}
        </div>
    </div>
    @endif

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8 mt-12">
        <div class="container mx-auto flex flex-col md:flex-row justify-between items-center">
            <div class="mb-4 md:mb-0">
                <h3 class="text-xl font-semibold">Service Company</h3>
                <p class="text-gray-400">Your one-stop solution for all your service needs.</p>
            </div>
            <div class="flex space-x-4 mb-4 md:mb-0">
                <a href="/" class="text-gray-400 hover:text-white">Home</a>
                <a href="/about" class="text-gray-400 hover:text-white">About</a>
                <a href="/services" class="text-gray-400 hover:text-white">Services</a>
                <a href="/contact" class="text-gray-400 hover:text-white">Contact</a>
            </div>
            <div class="flex space-x-4">
                <a href="https://facebook.com" target="_blank" class="text-gray-400 hover:text-white">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://twitter.com" target="_blank" class="text-gray-400 hover:text-white">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="https://instagram.com" target="_blank" class="text-gray-400 hover:text-white">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
        </div>
        <div class="mt-8 text-center text-gray-400 text-sm">
            &copy; 2024 Service Company. All rights reserved.
        </div>
    </footer>

</body>

</html>
