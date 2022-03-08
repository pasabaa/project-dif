@extends('layouts.admin')

@section('content')
<div class="row justify-content-center mt-4 pt-4">
    <div class="col-lg-10 col-12 py-4">
        <h1>Panel de Control</h1>
        <h4>Bienvenido {{Auth::user()->name}}</h4>
        <div class="d-flex align-items-center">
            <button id="button-card" class="btn text-muted-variant p-0 me-2"><i class="bi bi-grid-fill"></i></button>
            <button id="button-list" class="btn p-0 ms-2"><i class="bi bi-grid-3x2-gap-fill"></i></button>
        </div>
    </div>
</div>

<div class="row justify-content-center d-none" id="list">
    <div class="col-lg-10 col-12">
        <div class="card border-0">
            <div class="card-header border-0">
                <h4>Sitio</h4>
            </div>
            <div class="card-body d-flex">
                <a target="blank" class="nav-link text-muted" href="{{url('/abouts')}}"><i class="bi bi-file-earmark-person-fill me-2"></i> Acerca de</a>

                <div class="dropdown">
                    <button class="btn nav-link text-muted dropdown-toggle" type="button" id="dropdownMenuButtonNotice"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-newspaper me-2"></i> Noticias
                    </button>
                    <ul class="dropdown-menu border-0" aria-labelledby="dropdownMenuButtonNotice">
                        <li><a target="blank" class="dropdown-item m-0" href="{{url('/notices')}}"><i class="bi bi-newspaper me-2"></i> Noticias</a></li>
                        <li><a target="blank" class="dropdown-item m-0" href="{{url('/categories')}}"><i class="bi bi-tags-fill me-2"></i> Categorias</a></li>
                    </ul>
                </div>


                <div class="dropdown">
                    <button class="btn nav-link text-muted dropdown-toggle" type="button" id="dropdownMenuButtonService"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-bag me-2"></i> Servicios
                    </button>
                    <ul class="dropdown-menu border-0" aria-labelledby="dropdownMenuButtonService">
                        <li><a target="blank" class="dropdown-item m-0" href="{{url('/services')}}"><i class="bi bi-bag-fill me-2"></i> Servicios</a></li>
                        <li><a target="blank" class="dropdown-item m-0" href="{{url('/types')}}"><i class="bi bi-tags-fill me-2"></i> Tipo</a></li>
                        <li><a target="blank" class="dropdown-item m-0" href="{{url('/modalities')}}"><i class="bi bi-tags-fill me-2"></i> Modalidad</a></li>
                    </ul>
                </div>


                <a target="blank" class="nav-link text-muted" href="{{url('/contacts')}}"><i class="bi bi-telephone me-2"></i> Contáctenos</a>

                <div class="dropdown">
                    <button class="btn nav-link text-muted dropdown-toggle" type="button" id="dropdownMenuButtonService"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-bandaid me-2"></i> Salud Familiar
                    </button>
                    <ul class="dropdown-menu border-0" aria-labelledby="dropdownMenuButtonService">
                        <li><a target="blank" class="dropdown-item m-0" href="{{url('/families')}}"><i class="bi bi-bandaid-fill me-2"></i> Salud Familiar</a></li>
                        <li><a target="blank" class="dropdown-item m-0" href="{{url('/responsable-family')}}"><i class="bi bi-tags-fill me-2"></i> Responsables Salud Familiar</a></li>
                    </ul>
                </div>

                <a target="blank" class="nav-link text-muted" href="{{url('/responsibles')}}"><i class="bi bi-person me-2"></i> Responsables</a>
            </div>
        </div>
    </div>

    <div class="col-lg-10 col-12 mt-4">
        <div class="card border-0">
            <div class="card-header border-0">
                <h4>Usuario</h4>
            </div>
            <div class="card-body d-flex">
                <a target="blank" class="nav-link text-muted" href="{{url('/users')}}"><i class="bi bi-people-fill me-2"></i> Usuarios</a>
            </div>
        </div>
    </div>
</div>


<div class="row justify-content-center" id="card-list">

    <div class="col-lg-10 col-12">
        <div class="card border-0">
            <div class="card-header border-0 bg-gray-light">
                <h1 class="m-0 px-4 text-pink">Sitio</h1>
            </div>
            <div class="card-body bg-gray-light">
                <div class="row">

                    <div class="col-lg-3 col-md-6 col-12 p-4">
                        <div class="card bg-white border-0 p-2 text-center h-100">
                            <a target="blank" class="nav-link stretched-link text-muted" href="{{url('/abouts')}}"><i class="bi bi-info-circle fs-1"></i></a>
                            <p class="fw-bolder">Acerca de</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 p-4">
                        <div class="card bg-white border-0 p-2 text-center h-100 overflow-hidden">
                            <button id="notice" class="btn text-muted stretched-link" type="button"><i
                                    class="bi bi-newspaper fs-1"></i></button>
                            <p class="fw-bolder">Noticias</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 p-4 notice d-none">
                        <div class="card bg-gray-light border-0 p-2 text-center h-100">
                            <a target="blank" class="nav-link stretched-link text-muted" href="{{url('/notices')}}"><i
                                class="bi bi-newspaper fs-1"></i></a>
                            <p class="fw-bolder">Noticias</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 p-4 notice d-none">
                        <div class="card bg-gray-light border-0 p-2 text-center h-100">
                            <a target="blank" class="nav-link text-muted stretched-link" href="{{url('/categories')}}"><i
                                    class="bi bi-tags-fill fs-1"></i></a>
                            <p class="fw-bolder">Categorias</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 p-4">
                        <div class="card bg-white border-0 p-2 text-center h-100">

                            <button id="service" class="btn text-muted stretched-link"><i
                                    class="bi bi-bag fs-1"></i></button>
                            <p class="fw-bolder">Servicios</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 p-4 service d-none">
                        <div class="card bg-gray-light border-0 p-2 text-center h-100">
                            <a target="blank" class="nav-link stretched-link text-muted" href="{{url('/services')}}"><i
                                class="bi bi-bag-fill fs-1"></i></a>
                            <p class="fw-bolder">Servicios</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 p-4 service d-none">
                        <div class="card bg-gray-light border-0 p-2 text-center h-100">
                            <a target="blank" class="nav-link text-muted stretched-link" href="{{url('/types')}}"><i
                                    class="bi bi-tags-fill fs-1"></i></a>
                            <p class="fw-bolder">Tipo</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 p-4 service d-none">
                        <div class="card bg-gray-light border-0 p-2 text-center h-100">
                            <a target="blank" class="nav-link text-muted stretched-link" href="{{url('/modalities')}}"><i
                                    class="bi bi-tags-fill fs-1"></i></a>
                            <p class="fw-bolder">Modalidad</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 p-4">
                        <div class="card bg-white border-0 p-2 text-center h-100">
                            <a target="blank" class="nav-link text-muted stretched-link" href="{{url('/contacts')}}"><i
                                    class="bi bi-telephone fs-1"></i></a>
                            <p class="fw-bolder">Contacto</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 p-4">
                        <div class="card bg-white border-0 p-2 text-center h-100">
                            <button id="familie" class="btn text-muted stretched-link"><i class="bi bi-bandaid fs-1"></i></button>
                            <p class="fw-bolder">Salud Familiar</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 p-4 familie d-none">
                        <div class="card bg-gray-light border-0 p-2 text-center h-100">
                            <a target="blank" class="nav-link text-muted stretched-link" href="{{url('/families')}}"><i class="bi bi-bandaid-fill fs-1"></i></a>
                            <p class="fw-bolder">Salud Familiar</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 p-4 familie d-none">
                        <div class="card bg-gray-light border-0 p-2 text-center h-100">
                            <a target="blank" class="nav-link text-muted stretched-link" href="{{url('/responsable-family')}}"><i
                                    class="bi bi-tags-fill fs-1"></i></a>
                            <p class="fw-bolder">Responsables Salud Familiar</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 p-4">
                        <div class="card bg-white border-0 p-2 text-center h-100">
                            <a target="blank" class="nav-link text-muted stretched-link" href="{{url('/responsibles')}}"><i
                                    class="bi bi-person fs-1"></i></a>
                            <p class="fw-bolder">Responsables</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @role('admin')
    <div class="col-lg-10 col-12">
        <div class="card border-0">
            <div class="card-header border-0 bg-gray-light">
                <h1 class="m-0 px-4 text-pink">Usuario</h1>
            </div>
            <div class="card-body bg-gray-light">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12 p-4">
                        <div class="card bg-white border-0 p-2 text-center h-100">
                            <a target="blank" class="nav-link text-muted stretched-link" href="{{url('/users')}}"><i class="bi bi-people-fill fs-1"></i></a>
                            <p class="fw-bolder m-0">Usuarios</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endrole
</div>

<script async src="{{asset('js/button-grid.js')}}"></script>
<script async src="{{asset('js/button-notice.js')}}"></script>
@endsection
