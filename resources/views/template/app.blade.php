<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }}</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="/">{{ env('APP_NAME') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    @auth
                        <div class="dropdown">
                            <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="me-2">{{ auth()->user()?->personalInformation->name ?? auth()->user()->email }}</span>
                                <img src="{{ auth()->user()->avatar }}" class="rounded-pill"
                                    width="30" height="30">
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a type="button" class="dropdown-item" href="{{ route('logout') }}">
                                        Cerrar sesión
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @endauth
                    @guest
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    @endguest
                </div>
            </div>
        </div>
    </nav>
    <section>
        @yield('content')
    </section>
</body>

</html>
