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
    <title>Add service</title>
</head>
<body class="bg-light">
    <div class="container">
        @include('layouts.navigation')
        <h1 class="text-center m-4">Add service</h1>
        <form class="bg-light w-50 m-auto" action="/addservice" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">Service Name</label>
                <input type="text" class="form-control rounded" name="service_name">
            </div>
            @error('service_name')
            <span class="text-danger">{{ $message }}</span><br><br>
            @enderror
            <div class="mb-3">
                <label class="form-label">Service Description</label>
                <textarea type="text" class="form-control rounded" name="service_description"></textarea>
            </div>
            @error('service_description')
            <span class="text-danger ">{{ $message }}</span><br><br>
            @enderror
            <label class="form-label">Service Category</label>
            <select class="text-dark form-select rounded border-dark mb-3" name="category_id">
            @foreach ($category_id as $category)
                <option class="text-dark form-control" value={{$category->id}}>{{$category->name}}</option>            
            @endforeach
        </select>
            <input class="btn btn-primary" value="Add Service" type="submit">
            <a class="btn btn-success" href="/servicesdashboard">Back</a>
        </form>
    </div>
</body>
</html>
