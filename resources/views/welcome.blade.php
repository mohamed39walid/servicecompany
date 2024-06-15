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

    <title>Home Page</title>
</head>

<body class="bg-gradient-to-r from-slate-50 to-slate-100">
    @include('layouts.navigation')

    @if (!Auth()->user())
    <header class="container mx-auto text-center py-20">
        <h1 class="text-4xl font-bold text-gray-700 mb-4">Welcome to Service Company</h1>
        <p class="text-lg text-gray-600 mb-8">Your one-stop solution for all your service needs.</p>
        <a href="/register" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300">Get
            Started</a>
    </header>

    <div class="container mx-auto text-center py-12">
        <h1 class="text-3xl font-bold mb-8">Our Services</h1>
        <div class="flex flex-wrap justify-center">
            <div class="max-w-xs mx-4 mb-8">
                <span class="text-4xl text-blue-500 mb-4">⚙️</span>
                <h3 class="text-xl font-semibold text-blue-500 mb-2">Service Title</h3>
                <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum aliquam
                    metus nec diam consectetur, vel faucibus mi ultrices.</p>
            </div>
            <div class="max-w-xs mx-4 mb-8">
                <span class="text-4xl text-blue-500 mb-4">🔧</span>
                <h3 class="text-xl font-semibold text-blue-500 mb-2">Another Service Title</h3>
                <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum aliquam
                    metus nec diam consectetur, vel faucibus mi ultrices.</p>
            </div>
            <div class="max-w-xs mx-4 mb-8">
                <span class="text-4xl text-blue-500 mb-4">🔨</span>
                <h3 class="text-xl font-semibold text-blue-500 mb-2">Yet Another Service Title</h3>
                <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum aliquam
                    metus nec diam consectetur, vel faucibus mi ultrices.</p>
            </div>
        </div>
    </div>
    @endif

    @if(Auth()->user() && (Auth()->user()->role == 'admin'))
    <header class="container mx-auto text-center py-20">
        <h1 class="text-4xl font-bold text-gray-700 mb-4">Welcome to Service Company</h1>
        <h3 class="text-2xl text-gray-600 mb-8">Your one-stop solution for all your service needs.</h3>
        <a href="/categorydashboard" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg mb-4">Category
            Dashboard</a>
        <a href="/servicesdashboard" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg">Services
            Dashboard</a>
    </header>
    @endif

    @if(Auth()->user() && (Auth()->user()->role == 'user'))
    <header class="container mx-auto text-center py-10">
        <h1 class="text-4xl font-bold text-gray-700 mb-4">Welcome to Service Company</h1>
        <h3 class="text-2xl text-gray-600 mb-8">Your one-stop solution for all your service needs.</h3>
        <a href="#companyservices" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg mb-8">Discover
            Company Services</a>
    </header>
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
                    $inCart = $service_id->contains('service_id', $service->id);
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


                </div>
            </div>
            @endforeach
        </div>
        <div class="mt-8 w-1/4 m-auto">
            {{ $services->links() }}
        </div>
    </div>
    @endif

</body>

</html>
