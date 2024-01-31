<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Lab crud laravel basic</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="sidebar-mini" style="height: auto;">
    <div class="wrapper">

        @include('Layouts.Navbar')

        @include('Layouts.Sidebar')
        <div class="content-wrapper" style="min-height: 1302.4px;">
            @yield('content')
        </div>

        @include('Layouts.Footer')


    </div>
    @yield('script_ajax')
</body>

</html>
