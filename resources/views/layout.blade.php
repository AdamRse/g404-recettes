<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <nav>
        Recettes 404 : Site de recettes pour tous
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        Recettes 404 &copy; Adam
    </footer>
    @stack('scripts')
</body>
</html>
