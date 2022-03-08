<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="PEl Sistema Municipal para el Desarrollo Integral de la Familia (SMDIF), es el organismo público encargado de instrumentar, aplicar y dar dimensión a las políticas públicas en el ámbito de la asistencia social. ">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$title}}</title>

    <script defer src="{{ asset('js/app.js') }}"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>

    <div class="container-fluid m-0 p-0">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark p-4">
            <div class="container">
                <a class="navbar-brand fw-bolder" href="{{ url('/home') }}">
                    Panel de Control
                </a>
                <button class="navbar-toggler border-0 ms-auto" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">

                        <li class="nav-item dropdown">

                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end border-0" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('home') }}"><i
                                        class="bi bi-house-door-fill"></i>
                                    {{ __('Home') }}</a>
                                <a class="dropdown-item" target="_blank" href="{{ url('/') }}"><i
                                        class="bi bi-globe"></i>
                                    {{ __('Ir al sitio') }}</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                                         document.getElementById('logout-form').submit();"><i class="bi bi-door-open-fill"></i>
                                    {{ __('Cerrar Sesión') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

        </nav>

    </div>

    <div class="container">
        @yield('content')
    </div>
</body>


</html>
