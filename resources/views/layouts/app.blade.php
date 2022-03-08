<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="El Sistema Municipal para el Desarrollo Integral de la Familia (SMDIF), es el organismo público encargado de instrumentar, aplicar y dar dimensión a las políticas públicas en el ámbito de la asistencia social. ">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$title}}</title>

    <!-- Scripts -->
    <script defer src="{{ asset('js/app.js') }}"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app" class="d-flex flex-column min-vh-100">
        <nav class="navbar navbar-expand-md navbar-dark sticky-top bg-dark p-4">
            <div class="container">
                <a class="navbar-brand fw-bolder" href="{{ url('/') }}">
                    DIF Acámbaro
                </a>
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/')}}">Inicio</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/acerca-de')}}">Acerca de</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/noticias')}}">Noticias</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/servicios')}}">Servicios</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/contacto')}}">Contáctenos</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/salud-familiar')}}">Salud Familiar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/responsables')}}">Responsables</a>
                        </li>
                    </ul>

                    @role('admin')
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest

                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right border-0" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('home') }}"><i
                                        class="bi bi-house-door-fill"></i> {{ __('Home') }}</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                        class="bi bi-door-open-fill"></i>
                                    {{ __('Cerrar Sesión') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                    @endrole
                </div>
            </div>
        </nav>

        <div class="container">
            <main>
                @yield('content')
            </main>
        </div>


        <footer class="container-fluid mt-auto mb-0 bg-dark">
            <div class="row p-4">
                <div class="col-lg-3 col-12 p-2 text-white">
                    <p class="fw-bolder">Redes Sociales</p>
                    <div class="mt-2 d-flex gap-2">
                        <a class="fs-4 text-muted" href="https://www.facebook.com/facebookforreplacement"><i class="bi bi-facebook"></i></a>
                        <a class="fs-4 text-muted" href="https://twitter.com/twitterforreplacement"><i class="bi bi-twitter"></i></a>
                        <a class="fs-4 text-muted" href="https://www.linkedin.com/in/linkedinforreplacement"><i class="bi bi-linkedin"></i></a>
                        <a class="fs-4 text-muted" href="https://plus.google.com/example"><i class="bi bi-google"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-12 p-2 text-white">
                    <p class="fw-bolder">Contacto</p>
                    <div class="mt-2">
                        <p><i class="bi bi-telephone-fill"></i> <span><a class="btn text-white"
                                    href="tel:417-1725151">Télefono</a></span></p>
                        <p><i class="bi bi-envelope-fill"></i> <span><a class="btn text-white"
                                    href="mailto:dif.direccion@hotmail.com">Correo electrónico</a></span></p>
                    </div>

                </div>
            </div>
        </footer>
    </div>
</body>
</html>
