<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Il Mio Blog')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-light text-dark">

    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom border-danger">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">Il Blog</a>

            <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse" data-bs-target="#mainNav"
                    aria-controls="mainNav" aria-expanded="false" aria-label="Apri navigazione">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto gap-2">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('projects.index') }}">Post</a>
                    </li>

                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.index') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button type="submit" class="nav-link border-0 bg-transparent text-white">
                                    Logout
                                </button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    {{-- PAGE HEADER --}}
    @hasSection('page-header')
        <header class="bg-dark text-white py-4 mb-4">
            <div class="container text-center">
                @yield('page-header')
            </div>
        </header>
    @endif

    {{-- FLASH MESSAGES --}}
    @if (session('success'))
        <div class="container mt-3">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Chiudi"></button>
            </div>
        </div>
    @endif

    @if (session('error'))
        <div class="container mt-3">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Chiudi"></button>
            </div>
        </div>
    @endif

    {{-- MAIN --}}
    <main class="container py-4">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="bg-dark text-white-50 py-3 mt-5 border-top border-danger">
        <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
            <span>
                &copy; {{ date('Y') }}
                <strong class="text-white">Il Blog</strong>
                — Tutti i diritti riservati
            </span>
            <span>
                Realizzato con
                <a href="https://laravel.com" class="text-white-50" target="_blank" rel="noopener noreferrer">Laravel</a>
                &amp;
                <a href="https://getbootstrap.com" class="text-white-50" target="_blank" rel="noopener noreferrer">Bootstrap</a>
            </span>
        </div>
    </footer>

</body>
</html>