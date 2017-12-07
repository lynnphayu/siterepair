<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/montserrat.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}">
    <style type="text/css">
    .header {
        background-color: #42A5F5;
        color: white;
        padding: 0 !important;
    }
    .header ul li a:hover{
        background-color: white;
        color: black !important;
    }
    .header ul {
        margin: 0;
    }
    </style>
    @yield('style')
</head>

<body>
    <div id="app">
        <div class="header">
            <div>
                <h3>Admin Panel</h3>
            </div>
            <ul class="is-hidden-mobile nav-list">
                <li><a href="{{ route('posts.index') }}">Posts</a></li>
                <li><a href="{{ route('admin.createDep') }}">Department</a></li>
                <li><a href="/"></a></li>
            </ul>
            <div class="toggle-button is-hidden-desktop is-hidden-tablet"><img id="button_image" src="/menu2.png"></div>
        </div>
    </div>
    @yield('content')
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('script')
</body>

</html>