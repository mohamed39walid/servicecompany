<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Cart</title>
</head>
<body class="bg-gradient-to-r from-slate-50 to-slate-100">
    @include('layouts.navigation')
    <h1 class="text-7xl text-center">{{$h1}}</h1>
    <div class="container w-3/4 m-auto p-3">

        @foreach ($servicescart as $cart_item)
        <div class="md:flex-grow">
            <h2 class="text-2xl font-medium text-gray-900 title-font mb-2">{{ htmlspecialchars($cart_item['service_name']) }}</h2>
            <p class="leading-relaxed">{{htmlspecialchars($cart_item['service_description']) }}</p>
            <a class="text-indigo-500 inline-flex items-center mt-4">Book Now
                <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14"></path>
                    <path d="M12 5l7 7-7 7"></path>
                </svg>
            </a>
            <form action="/deletefromcartpage/{{htmlspecialchars($cart_item['id'])}}" method="post">
                @csrf
                <button type="submit" class="inline-block my-3 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300 mr-2">Delete From Cart
                </button>
                @method('DELETE')
            </form>
            <hr class="h-2 border-0 border-t-4 m-2">
        </div>
        @endforeach
    </div>
</body>
</html>
