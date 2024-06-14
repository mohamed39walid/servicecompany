<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Categories Dashboard</title>
</head>
<body class="bg-gradient-to-r from-slate-50 to-slate-100">
    @include('layouts.navigation')
    <div class="container mx-auto w-3/4 ">
        <h1 class="text-center text-5xl mt-3">Categories Dashboard</h1>
        <div class="flex flex-wrap justify-center mt-3">
            @foreach ($categories as $category)
            <section class="text-gray-600 w-1/2 body-font text-center">
                <div class="w-full p-4">
                    <div class="border border-blue-950 p-6 rounded-lg">
                        <div class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-blue-100 text-blue-500 mb-4">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                                <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                            </svg>
                        </div>
                        <h2 class="text-lg text-gray-900 font-medium title-font mb-2">Service Name: {{$category->name}}</h2>
                        <p class="leading-relaxed text-base">Service Description: {{$category->description}}</p>
                        <p class="leading-relaxed text-base">Category Id: {{$category->services}}</p>
                        <a class="flex mx-auto mt-2 text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-700 rounded text-lg w-1/4" href='updatecategory/{{$category->id}}'>Update</a>
                        <a class="flex mx-auto mt-2 text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-700 rounded text-lg w-1/4" href='deletecategory/{{$category->id}}'>Delete</a>
                    </div>
                </div>
            </section>
            @endforeach
        </div>
        <div class="text-center p-3 w-1/4 text-white m-auto">
            {{$categories->links('pagination::tailwind')}}
        </div>
        
       <a href="/addcategory"><button class="flex mx-auto mt-10 m-10 text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded text-lg">Add Category</button></a>
    </div>
</body>
</html>
