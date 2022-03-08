<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$title}}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>

    <div class="container-fluid">


                <nav class="navbar navbar-expand-md navbar-light bg-white p-4 fw-bolder">
                    <div class="container">
                        <ul class="nav ms-auto">
    
                            <li class="nav-item dropdown">
    
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
    
                                <div class="dropdown-menu dropdown-menu-right border-0" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('home') }}"><i class="bi bi-house-door-fill"></i> {{ __('Home') }}</a>
                                    <a class="dropdown-item" target="_blank" href="{{ url('/') }}"><i class="bi bi-globe"></i> {{ __('Ir al sitio') }}</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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

                </nav>

    </div>

    <div class="container">
        @yield('content')
    </div>

    <script src="{{asset('js/button-grid.js')}}"></script>
    <script src="{{asset('js/button-notice.js')}}"></script>

</body>


</html>
