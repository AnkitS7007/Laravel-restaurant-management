<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restaurant Management System</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <!-- Styles -->
    <style>
        html, body {
            background-color: #f5f5f5;
            color: #333;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden; /* Prevent scrolling */
        }
        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }
        .content {
            text-align: center;
        }
        .title {
            font-size: 48px;
            font-weight: 600;
            margin-bottom: 20px;
        }
        .subtitle {
            font-size: 24px;
            font-weight: 400;
            color: #777;
        }
        .links {
            margin-top: 20px;
        }
        .links > a {
            color: #4285f4;
            padding: 10px 20px;
            font-size: 18px;
            text-decoration: none;
            border: 2px solid #4285f4;
            border-radius: 5px;
            margin: 5px;
        }
        .links > a:hover {
            background-color: #4285f4;
            color: #fff;
        }
        footer {
            text-align: center;
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            position: absolute;
            bottom: 0;
            width: 100%;
        }
        .copyright {
            font-size: 12px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="title">
            <i class="fas fa-hamburger"></i> Restaurant Management System
        </div>
        <div class="subtitle">by Ankit Sharma</div>
        <div class="links">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/home') }}">Welcome</a>
                @else
                    <a href="{{ route('login') }}">Login Here</a>
                @endauth
            @endif
        </div>
    </div>
</div>

<footer>
    <div class="container">
        <p class="copyright">&copy; {{ date('Y') }} Restaurant Management System. All rights reserved.</p>
    </div>
</footer>
</body>
</html>
