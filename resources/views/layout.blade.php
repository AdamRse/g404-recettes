<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <nav>
        <div>
            Recettes 404 : Site de recettes pour tous
        </div>
        <div>
            <ul>
                <li><a href="/">Accueil</a></li>
                <li><a href="/receipes">Recettes</a></li>
            </ul>
        </div>
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
