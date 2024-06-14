<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Add Category</title>
</head>
<body class="bg-gradient-to-r from-slate-50 to-slate-100">
    @include('layouts.navigation')
    <div class="container mx-auto p-6">
        <h1 class="text-4xl text-center mb-6">Add Category</h1>
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 mx-auto max-w-md" action="/addcategory" method="post">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Category Name</label>
                <input id="name" name="name" type="text" placeholder="Category Name" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('name')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Category Description</label>
                <input id="description" name="description" type="text" placeholder="Category Description" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('description')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="services">Services</label>
                <input id="services" name="services" type="text" placeholder="Services" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('services')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Add Category</button>
                <a href="/categorydashboard" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">Back</a>
            </div>
        </form>
    </div>
</body>
</html>
