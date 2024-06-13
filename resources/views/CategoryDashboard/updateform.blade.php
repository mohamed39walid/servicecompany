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
    <title>Update Category</title>
</head>

<body class="bg-light text-dark">
    @include('layouts.navigation')
    <div class="container">
        <h1 class="text-center m-3" style="font-size: 50px">Update Category</h1>
        <form class="bg-light text-dark w-50 m-auto" action="/updatecategory/{{$id}}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">Category Name</label>
                <input type="text" class="form-control rounded" name="name" value={{ old('categoryname',$category->name)}}>
            </div>
            @error('name')
            <span class="text-danger">{{ $message }}</span><br><br>
            @enderror
            <div class="mb-3">
                <label class="form-label">Category Description</label>
                <input type="text" class="form-control rounded" name="description" value="{{ old('categorydescription', $category->description) }}">
            </div>
            @error('description')
            <span class="text-danger ">{{ $message }}</span><br><br>
            @enderror
            <div class="mb-3">
                <label class="form-label">Services</label>
                <input type="text" class="form-control rounded" name="services" value="{{ old('services', $category->services) }}">
            </div>
            @error('services')
            <span class="text-danger ">{{ $message }}</span><br><br>
            @enderror
            <input class="btn btn-primary" value="Update Category" type="submit">
            <a class="btn btn-success" href="/categorydashboard">Back</a>
            @method('PUT')
        </form>

    </div>
</body>
</html>
