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
            }else if(urlParams.has('role') || urlParams.has('unauthorize')){
                $(window).on('load', function() {
                    $('#noAccess').modal('show');
                });
            }
        </script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Inter" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lobster+Two" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/curhat.css') }}" rel="stylesheet">
        <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
        <link href="{{ asset('css/about.css') }}" rel="stylesheet">
        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
        <link href="{{ asset('css/donation.css') }}" rel="stylesheet">
    </head>
    <body class="bg-light">
        <nav class="navbar navbar-expand-lg fixed-top navbar-light" style="background-color: #e3f2fd;" aria-label="Main navigation">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img class="img-fluid" src="{{asset('storage/logo.png')}}" style="height: 50px;">
                </a>

                <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Activity</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('aboutView') }}">About</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('donationView') }}">Donation</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Gallery</a>
                        </li>

                        @auth
                            @if (Auth::user()->role == 'member')
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">More</a>
        
                                    <ul class="dropdown-menu" aria-labelledby="dropdown01">
                                        <li>
                                            <a class="dropdown-item" href="#">Action</a>
                                        </li>
        
                                        <li>
                                            <a class="dropdown-item" href="#">Another action</a>
                                        </li>
        
                                        <li>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </li>
                                    </ul>
                                </li>
                            @elseif (Auth::user()->role == 'admin' || Auth::user()->role == 'super admin')
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">Admin</a>
        
                                    <ul class="dropdown-menu" aria-labelledby="dropdown01">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('addUserView') }}">Tambah Pengguna</a>
                                        </li>

                                        <li>
                                            <a class="dropdown-item" href="{{ route('addParentView') }}">Tambah Orang Tua</a>
                                        </li>
        
                                        <li>
                                            <a class="dropdown-item" href="{{ route('absentView') }}">Absen</a>
                                        </li>
        
                                        <li>
                                            <a class="dropdown-item" href="#">Tambah Etalase Hadiah</a>
                                        </li>

                                        <li>
                                            <a class="dropdown-item" href="{{ route('updateProgressView') }}">Update Progress Siswa</a>
                                        </li>

                                        <li>
                                            <a class="dropdown-item" href="#">Update Kegiatan</a>
                                        </li>

                                        @if((Auth::user()->role == 'super admin'))
                                        <hr>

                                        <li>
                                            <a class="dropdown-item" href="{{ route('addAdminView') }}">Tambah admin</a>
                                        </li>

                                        <li>
                                            <a class="dropdown-item" href="{{ route('deleteAdminView') }}">Hapus admin</a>
                                        </li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                        @endauth
                    </ul>

                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        @guest
                            <li class="nav-item dropdown">
                                <a class="nav-link"
                                    style="cursor: pointer"
                                    data-bs-toggle="modal"
                                    data-bs-target="#loginModal">{{ __('Login') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->fullName }}</a>

                                <ul class="dropdown-menu" aria-labelledby="dropdown02">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('viewProfile', Auth::user()->id) }}">Profile</a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        
        {{-- <div class="nav-scroller bg-body shadow-sm">
            <nav class="nav nav-underline" aria-label="Secondary navigation">
                <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
                <a class="nav-link" href="#">
                    Friends
                    <span class="badge bg-light text-dark rounded-pill align-text-bottom">27</span>
                </a>
                <a class="nav-link" href="#">Explore</a>
                <a class="nav-link" href="#">Suggestions</a>
                <a class="nav-link" href="#">Link</a>
                <a class="nav-link" href="#">Link</a>
                <a class="nav-link" href="#">Link</a>
                <a class="nav-link" href="#">Link</a>
                <a class="nav-link" href="#">Link</a>
            </nav>
        </div> --}}

        <main class="container mt-3">
            @yield('content')
        </main>

        @yield('scripts')

        <script src="{{ asset('js/navbar.js') }}"></script>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}" defer></script>
    </body>
</html>

<style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
</style>

@guest
    @include('partials.login')
    {{-- @include('partials.register') --}}
@else
    @include('partials.noAccess')
@endguest