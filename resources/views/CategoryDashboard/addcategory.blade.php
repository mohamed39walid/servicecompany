<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Add Category</title>
</head>
<body class="bg-light">
    <div class="container">
        @include('layouts.navigation')
        <h1 class="text-center m-4">Add Category</h1>
        <form class="bg-light w-50 m-auto" action="/addcategory" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">Category Name</label>
                <input type="text" class="form-control rounded" name="name">
            </div>
            @error('name')
            <span class="text-danger">{{ $message }}</span><br><br>
            @enderror
            <div class="mb-3">
                <label class="form-label">Category Description</label>
                <input type="text" class="form-control rounded" name="description">
            </div>
            @error('description')
            <span class="text-danger ">{{ $message }}</span><br><br>
            @enderror
            <div class="mb-3">
                <label class="form-label">Services</label>
                <input type="text" class="form-control rounded" name="services">
            </div>
            @error('services')
            <span class="text-danger ">{{ $message }}</span><br><br>
            @enderror
            <input class="btn btn-primary" value="Add Category" type="submit">
            <a class="btn btn-success" href="/categorydashboard">Back</a>
        </form>
    </div>
</body>
</html>
