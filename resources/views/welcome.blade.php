<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Home Page</title>
    <style>
        .container-fluid {
            width: 100%;
            margin: auto;
            padding: 20px;
        }

        h1 {
            font-size: 36px;
            margin-bottom: 20px;
            color: #555;
        }

        p {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .cta-button {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            font-size: 18px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .cta-button:hover {
            background-color: #0056b3;
        }

        .services-section {
            padding: 40px 0;
            background-color: #fff;
        }

        .service {
            margin-bottom: 40px;
        }

        .service-title {
            font-size: 24px;
            color: #007bff;
            margin-bottom: 10px;
        }

        .service-description {
            font-size: 16px;
            color: #555;
            margin-bottom: 10px;
        }

        .service-icon {
            font-size: 48px;
            color: #007bff;
            margin-bottom: 20px;
        }

        ///user part
        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 300px;
            margin: 20px auto;
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            padding: 20px;
            text-align: center;
            font-size: 24px;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 20px;
            margin-bottom: 10px;
            color: #333;
        }

        .card-text {
            font-size: 16px;
            color: #555;
            line-height: 1.6;
        }

        .card-footer {
            background-color: #f4f4f4;
            padding: 10px;
            text-align: center;
            font-size: 14px;
        }

        .cta-button {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .cta-button:hover {
            background-color: #0056b3;
        }

        .userwelcomepage {
            height: 60vh
        }

    </style>
</head>
<body class="bg-white">
    @include('layouts.navigation')
    @if (!Auth()->user())
    <header>
        <div class="container-fluid m-auto text-center">
            <h1>Welcome to Service Company</h1>
            <p>Your one-stop solution for all your service needs.</p>
            <a href="/register" class="cta-button">Get Started</a>
        </div>
    </header>

    <div class="container-fluid p-3 m-auto text-center services-section">
        <h1>Our Services</h1>
        <div class="service">
            <span class="service-icon">⚙️</span>
            <h3 class="service-title">Service Title</h3>
            <p class="service-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum aliquam metus nec diam consectetur, vel faucibus mi ultrices.</p>
        </div>
        <div class="service">
            <span class="service-icon">🔧</span>
            <h3 class="service-title">Another Service Title</h3>
            <p class="service-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum aliquam metus nec diam consectetur, vel faucibus mi ultrices.</p>
        </div>
        <div class="service">
            <span class="service-icon">🔨</span>
            <h3 class="service-title">Yet Another Service Title</h3>
            <p class="service-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum aliquam metus nec diam consectetur, vel faucibus mi ultrices.</p>
        </div>
    </div>
    @endif
    @if(Auth()->user() && (Auth()->user()->role == 'admin'))
    <div>
        <header class="d-flex justify-content-center align-items-center">
            <div class="container-fluid userwelcomepage text-center p-5 mt-5 mb-5">
                <h1 style="font-size: 60px">Welcome to Service Company</h1>
                <h3 style="font-size:30px">Your one-stop solution for all your service needs.</h3>
                <a href="#dashboards" class="cta-button m-3">See Dashboards</a>
            </div>
        </header>
        <div class="card-header" id="dashboards">
            Dashboards
        </div>
        <div class="m-auto text-center">
            <a href="/categorydashboard" class="cta-button m-3">Category Dashboard</a>
            <a href="/servicesdashboard" class="cta-button m-3">Services Dashboard</a>
        </div>

    </div>
    @endif
    @if(Auth()->user() && (Auth()->user()->role == 'user'))
    <header class="d-flex justify-content-center align-items-center">
        <div class="container-fluid userwelcomepage text-center p-5 mt-5 mb-5">
            <h1 style="font-size: 60px">Welcome to Service Company</h1>
            <h3 style="font-size:30px">Your one-stop solution for all your service needs.</h3>
            <a href="#companyservices" class="cta-button m-3">Discover Company Services</a>

        </div>
    </header>
    <div class="card-header" id="companyservices">
        Company Services
    </div>
    <div class="row w-100 m-auto d-flex justify-content-center text-center">
        @foreach ($services as $service)
        <div class="card col-md-4 w-25 col-sm-12 m-3 h-100">
            <div class="card-body text-center">
                <h2 class="card-title">{{$service->service_name}}</h2>
                <p class="card-text">{{$service->service_description}}</p>
            </div>
        </div>
        @endforeach
        <div class="text-center d-flex justify-content-center p-3">
            {{$services->links()}}
        </div>
    </div>

    @endif
</body>
</html>
