<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Blog-vue') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar is-light" role="navigation" aria-label="main navigation">
            <div class="container">

                {{-- LEFT --}}
                <div class="navbar-brand">
                    <a class="navbar-item" href="https://bulma.io">
                        <img src="https://bulma.io/images/bulma-logo.png" alt="Bulma: a modern CSS framework based on Flexbox" width="112" height="28">
                    </a>

                    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false">
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                        </a>
                </div>

                <div class="navbar-start">
                    <a href="#" class="navbar-item">Learn</a>
                    <a href="#" class="navbar-item">Discuss</a>
                    <a href="#" class="navbar-item">Share</a>
                </div>
                
                {{-- RIGHT  --}}
                <div class="navbar-end">
                @if (!Auth::guest())
                    <a href="#" class="navbar-item">Login</a>
                    <a href="#" class="navbar-item">Join</a>
                @else
                    <div class="navbar-item is-aligned-right has-dropdown is-hoverable">
                            <a class="navbar-link">Hello RudRud</a>
                            <div class="navbar-dropdown is-right">
                                <a href="#" class="navbar-item">
                                    <span class="icon"><i class="fa fa-fw fa-user-circle-o"></i></span>
                                     Profile</a>
                                <a href="#" class="navbar-item">
                                    <span class="icon"><i class="fa fa-fw fa-bell"></i></span>
                                    Notification</a>
                                <a href="#" class="navbar-item">
                                    <span class="icon"><i class="fa fa-fw fa-cog"></i></span>
                                    Settings</a>
                                <hr class="navbar-divider">
                                <a href="#" class="navbar-item">
                                    <span class="icon"><i class="fa fa-fw fa-sign-out"></i></span>
                                    Logout</a>
                            </div>
                    </div>
                @endif
                </div>
            </div>
        </nav>
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
