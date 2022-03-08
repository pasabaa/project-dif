@extends('layouts.app')

@section('content')
<div class="row justify-content-between p-4 mt-4">
    <h1 class="display-4">Contacto</h1>
    <p>En esta sección se presenta información de contacto del Sistema de Desarrollo Integral de la Familia del
        municipio de Acámbaro.</p>
    <div class="col-lg-4 col-12">
        @if ($message = Session::get('success'))
        <div class="alert bg-dark alert-dismissible fade show p-2 border-0" role="alert">
            <p class="m-0 text-white">{{ $message }}</p>
            <button type="button" class="btn-close btn-sm m-0 p-2 text-white" data-bs-dismiss="alert"
                aria-label="Close"></button>
        </div>
        @endif
    </div>

</div>

<div class="row justify-content-between p-4">


    <div class="col-lg-4 col-12">

        @includeif('partials.errors')

        <div class="card border-0">
            <div class="card-header fs-4 border-0">
                <span class="card-title">Envía un mensaje</span>
            </div>
            <div class="card-body">
                <form class="fw-bolder" method="POST" action="{{ route('contacts.store') }}" role="form" enctype="multipart/form-data">
                    @csrf

                    @include('contact.form')

                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-12 text-center">
        <div class="row">
            <div class="col-12">
                <p class="fs-4">También puede contactarnos por medio de:</p>
                <div class="row">
                    <div class="col-12">
                        <div class="mt-2 d-flex gap-4 justify-content-center align-items-center">
                            <a class=" text-muted fs-4" href="http://"><i class="bi bi-facebook"></i></a>
                            <a class=" text-muted fs-4" href="http://"><i class="bi bi-twitter"></i></a>
                            <a class=" text-muted fs-4" href="http://"><i class="bi bi-linkedin"></i></a>
                            <a class=" text-muted fs-4" href="http://"><i class="bi bi-google"></i></a>
                        </div>
                    </div>
                    <div class="col-12 my-4">
                        <div class=" mt-2 d-flex gap-4 justify-content-center align-items-center">
                            <p><i class="bi bi-telephone-fill me-2"></i> <span><a class="text-muted" href="tel:417-1725151">Télefono</a></span></p>
                            <p><i class="bi bi-envelope-fill me-2"></i> <span><a class="text-muted" href="mailto:dif.direccion@hotmail.com">Correo electrónico</a></span></p>
                        </div>
        
                    </div>
                </div>
            </div>
            <div class="col-12">
                <p class="fs-4">O visítenos en:</p>
                <div class="my-4">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d59978.57551973795!2d-100.727631!3d20.022739!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9dc54bc3d58d785f!2sDIF%20Municipal%20Ac%C3%A1mbaro!5e0!3m2!1ses-419!2smx!4v1645560760934!5m2!1ses-419!2smx" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection
