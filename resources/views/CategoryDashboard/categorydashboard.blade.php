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
    <title>Categories Dashboard</title>
</head>
<body>
    @include('layouts.navigation')
    <div class="container">
    <table class="container mt-3">
        <tbody class="table">
            <thead class="table-light">
                <th>Category Name</th>
                <th>Category Description</th>
                <th>Services</th>
                <th>Actions</th>
            </thead>
    @foreach ($categories as $category)
    <tr class="table-light mt-2">
        <td>{{$category->name}}</td>
        <td>{{$category->description}}</td>
        <td>{{$category->services}}</td>
        <td>
            <a class="btn btn-primary" href="/categoryupdate/{{$category->id}}">Update</a>
            <a href="/categorydelete/{{$category->id}}" class="btn btn-danger">Delete</a>
        </td>
    </tr>
    @endforeach
</tbody>
</table>
<div class="text-center d-flex justify-content-center p-3">
    {{$categories->links()}}
</div>
<a class="btn btn-primary mt-2" href="/addcategoryform">Add Category</a>
</div>
</body>
</html>