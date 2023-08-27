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
                            <a class="nav-link" href="#">Aktifitas</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('aboutView') }}">Tentang</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('donationView') }}">Donasi</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Galeri</a>
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
                                    @if (Auth::user()->role == 'member')
                                        <li>
                                            <a class="dropdown-item" href="{{ route('viewProfile', Auth::user()->id) }}">Profile</a>
                                        </li>
                                    @elseif (Auth::user()->role == 'parent')
                                        @foreach(Auth::user()->children as $child)
                                            <li>
                                                <a class="dropdown-item" href="{{ route('viewProfile', $child->id) }}">{{ $child->fullName }}</a>
                                            </li>
                                        @endforeach
                                    @endif

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
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </symbol>
                <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                </symbol>
                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </symbol>
            </svg>

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