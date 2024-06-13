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
    <title>Update service</title>
</head>
<body class="bg-light text-dark">
    @include('layouts.navigation')
    <div class="container">
        <h1 class="text-center m-3" style="font-size: 50px">Update service</h1>
        <form class="bg-light text-dark w-50 m-auto" action="/updateservice/{{$id}}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">service Name</label>
                <input type="text" class="form-control rounded" name="service_name" value={{ old('servicename',$service->service_name)}}>
            </div>
            @error('service_name')
            <span class="text-danger">{{ $message }}</span><br><br>
            @enderror
            <div class="mb-3">
                <label class="form-label">service Description</label>
                <textarea type="text" class="form-control rounded" name="service_description">{{ old('servicedescription', $service->service_description) }}</textarea>
            </div>
            @error('service_description')
            <span class="text-danger ">{{ $message }}</span><br><br>
            @enderror
            <label class="form-label">Service Category</label>
            <select class="text-dark form-select rounded border-dark mb-3" name="category_id">
            @foreach ($categories as $category)
                <option class="form-control" value={{$category->id}}>{{$category->name}}</option>            
            @endforeach
        </select>
            <input class="btn btn-primary" value="Update service" type="submit">
            <a class="btn btn-success" href="/servicesdashboard">Back</a>
            @method('PUT')
        </form>

    </div>
</body>
</html>
