<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="main-nav">
        <div class="nav-brand">
            Recettes 404 : Site de recettes pour tous
        </div>
        <div class="nav-links">
            <ul>
                <li><a href="/">Accueil</a></li>
                <li><a href="/receipes">Recettes</a></li>
            </ul>
        </div>
    </nav>
    <main class="main-content">
        @yield('content')
    </main>
    <footer class="main-footer">
        Recettes 404 &copy; Adam
    </footer>
    @stack('scripts')
</body>
</html>
