<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">



    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="{{ asset('login_frontend/css/style.css') }}" rel="stylesheet">

    <!-- Scripts -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>
{{-- <body class="font-sans text-gray-900 antialiased"> --}}
{{-- <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div >
                {{ $slot }}
            </div>
        </div> --}}

        <body class="img js-fullheight" style="background-image: url('{{ asset('login_frontend/images/bg.jpg') }}');">

    {{ $slot }}



    <script src="{{ asset('login_frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('login_frontend/js/popper.js') }}"></script>
    <script src="{{ asset('login_frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('login_frontend/js/main.js') }}"></script>

</body>

</html>
