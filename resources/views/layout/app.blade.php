<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title style="">Curhatku</title>

        <!-- Scripts -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script type="text/javascript">
            const urlParams = new URLSearchParams(window.location.search);
            if(urlParams.has('login')){
                $(window).on('load', function() {
                    $('#loginModal').modal('show');
                });
            }
        </script>

        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
        <script src="{{ asset('js/jquery.min.js') }}" defer></script>
        <script src="{{ asset('js/popper.js') }}" defer></script>
        <script src="{{ asset('js/main.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Inter" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lobster+Two" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('css/curhat.css') }}" rel="stylesheet">
        <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
        {{-- <link href="{{ asset('storage/asset/IKukku.png') }}" rel="icon"> --}}
    </head>
    <body>
        <div class="page">
            <nav id="colorlib-main-nav" role="navigation">
                <a href="{{ route('home') }}" class="js-colorlib-nav-toggle colorlib-nav-toggle active"></a>

                <div class="js-fullheight colorlib-table">
                    <div class="img" style="background-image: url(images/bg_3.jpg);"></div>
                    <div class="colorlib-table-cell js-fullheight">
                        <div class="row no-gutters">
                            <div class="col-md-12 text-center">
                                <h1 class="mb-4">
                                    <a href="{{ route('home') }}" class="logo">Company Logo</a>
                                </h1>

                                <ul>
                                    <li class="active">
                                        <a href="{{ route('home') }}"><span>Home</span></a>
                                    </li>

                                    <li>
                                        <a href="about.html"><span>About</span></a>
                                    </li>

                                    <li>
                                        <a href="blog.html"><span>Blog</span></a>
                                    </li>

                                    <li>
                                        <a href="contact.html"><span>Contact</span></a>
                                    </li>
                                                
                                    <!-- Authentication Links -->
                                    @guest
                                        <li class="nav-item" style="margin-top: 10px;">
                                            <a class="nav-link"
                                                style="cursor: pointer"
                                                data-bs-toggle="modal"
                                                data-bs-target="#loginModal">{{ __('Login') }}</a>
                                        </li>
                                    @else
                                        <li class="nav-item dropdown" style="margin-top: 10px;">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{ Auth::user()->name }}
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" {{-- href="{{ route('Profile') }}" --}}>Profile</a>
                                                {{-- <a class="dropdown-item"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#gantiPassword">Ganti Password</a> --}}
                                                <a class="dropdown-item" {{-- href="{{ route('logout') }}"--}}>Logout</a>
                                            </div>
                                        </li>
                                    @endguest
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            
            <div id="colorlib-page">
                <header>
                    <div class="container">
                        <div class="colorlib-navbar-brand">
                            <a class="colorlib-logo" href="{{ route('home') }}">Company Logo</a>
                        </div>

                        <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"></a>
                    </div>
                </header>
            
                <section class="hero-wrap js-fullheight">
                    <div class="container px-0">
                        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
                            <div class="col-md-12 ftco-animate text-center">
                                <div class="desc">
                                    @yield('content')
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        @yield('scripts')
    </body>
</html>

<style>

    @media only screen and (max-width: 800px) {
        .MenuDropDown{
            visibility: hidden;
        }
    }

</style>

{{-- @guest
    @include('partials.login')
    @include('partials.register')
@endguest --}}