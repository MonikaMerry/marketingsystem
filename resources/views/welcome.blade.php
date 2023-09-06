<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @include('components.css')
    <style>
        .front-page{
            margin-left: 20%;
            margin-top: 35px; 
        }
        .front-page h1{
           color: whitesmoke;
           font-family: cursive;
           font-weight: 900;
           font-size: 150px;
           background-image: linear-gradient(-225deg,#231557 0%,#44107a 29%,#ff1361 67%,#fff800 100% );
           background-size: auto auto;
           background-clip: border-box;
           background-size: 200% auto;
           color: #fff;
           background-clip: text;
           text-fill-color: transparent;
           -webkit-background-clip: text;
           -webkit-text-fill-color: transparent;
           animation: textclip 2s linear infinite;
           display: inline-block;
          
        }

       @keyframes textclip {
         to {
           background-position: 200% center;
         }
       }

    </style>
</head>

<body class="antialiased">
    <div
        class="relative sm:flex sm:justify-left sm:items-center min-h-screen  bg-center  selection:bg-red-500 selection:text-white">
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="font-semibold text-gray-600 hover:text-gray-600 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                        in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        {{-- leads management --}}

        <div class="front-page">
            <h1>Leads <br>Management</h1>
        </div>

    </div>
</body>

</html>
