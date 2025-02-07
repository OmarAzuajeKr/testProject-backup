<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Laravel')</title>
    <style>
        .active a {
            color: red;
            text-decoration: none;
        }
    </style>
</head>
<body>
@include('partials.nav')
    @yield('content')
</body>
</html>