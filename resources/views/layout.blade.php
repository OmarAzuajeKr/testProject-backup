<!-- filepath: /c:/Users/analista.desarrollo/Downloads/testProject/testProject/resources/views/layout.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>@yield('title', 'Laravel')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app" class="d-flex flex-column h-screen justify-content-between">
        <header>
            @include('partials.nav')
        </header>
        <main>
            @yield('content')
        </main>
        <footer class="bg-white text-center text-black-50 py-3 shadow-sm">
            {{config('app.name')}} | Copyright @ {{date('Y')}}
        </footer>
    </div>
</body>

</html>
