<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
</head>
<body class="c-app">
<div id="app" class="app-body">
    @include('backend.partials.sidebar')
    <div class="c-wrapper">
        @include('backend.partials.header')
        <div class="c-body">
            <main class="c-main">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('/js/app.js') }}" defer></script>
@yield('script')
@yield('style')
</body>

</html>
