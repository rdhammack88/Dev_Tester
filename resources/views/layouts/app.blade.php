<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('includes/navbar')
        @php
            // echo date('m/d/Y h:i:s a', time())
        @endphp
        {{-- <main class="wrapper" id="homePage">
            <div class="container"> --}}
                @yield('content')
            {{-- </div>
        </main> --}}
    </div>

    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>
</html>
