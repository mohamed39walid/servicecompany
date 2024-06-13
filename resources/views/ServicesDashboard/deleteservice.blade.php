<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Confirm Delete</title>
</head>
<body class="bg-light text-dark">
    <div class="container text-center">
        <h1 class="text-center mt-5">Confirm Delete</h1>
        <p class="text-center">Are you sure to delete this service?</p>
        <form action="/deleteservice/{{$id}}" method="post" class="d-inline">
            @csrf
            <input type="submit" value="Yes" class="btn btn-danger">
            @method('DELETE')
        </form>
        <a href="/servicesdashboard" class="btn btn-success m-auto">No</a>
    </div>
</body>
</html>