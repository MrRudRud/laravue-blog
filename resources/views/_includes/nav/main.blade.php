       <nav class="navbar" role="navigation" aria-label="main navigation">
            <div class="container">

                {{-- LEFT --}}
                <div class="navbar-brand">
                    <a class="navbar-item" href="https://bulma.io">
                        <img src="{{asset('images/bulma-logo.png')}}" alt="Bulma: a modern CSS framework based on Flexbox" width="112" height="28">
                    </a>

                    <div class="navbar-burger burger" data-target="navbar-burger">
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                    </div>
                </div>
                <div class="navbar-menu" id="navbar-burger">
                <div class="navbar-start">
                    <a href="#" class="navbar-item">Learn</a>
                    <a href="#" class="navbar-item">Discuss</a>
                    <a href="#" class="navbar-item">Share</a>
                </div>
                
                {{-- RIGHT  --}}
                <div class="navbar-end">
                @if (Auth::guest())
                    <a href="{{route('login')}}" class="navbar-item">Login</a>
                    <a href="{{route('register')}}" class="navbar-item">Join The Comunity</a>
                @else
                    <div class="navbar-item is-aligned-right has-dropdown is-hoverable">
                        <a class="navbar-link">Hello {{ Auth::user()->name }}</a>
                            <div class="navbar-dropdown is-right">
                                <a href="#" class="navbar-item">
                                    <span class="icon m-r-5"><i class="fa fa-fw fa-user-circle-o"></i></span>
                                     Profile</a>
                                <a href="#" class="navbar-item">
                                    <span class="icon m-r-5"><i class="fa fa-fw fa-bell"></i></span>
                                    Notification</a>
                                <a href="{{route('manage.dashboard')}}" class="navbar-item">
                                    <span class="icon m-r-5"><i class="fa fa-fw fa-cog"></i></span>
                                    Manage</a>
                                <hr class="navbar-divider">
                                <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="navbar-item">
                                    <span class="icon m-r-5"><i class="fa fa-fw fa-sign-out"></i></span>
                                    Logout</a>
                                @include('_includes.forms.logout')
                            </div>
                    </div>
                @endif
                </div>
                </div>
            </div>
        </nav>