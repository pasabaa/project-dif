@extends('layouts.admin')

@section('template_title')
Crear Responsable
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header d-flex align-items-center">
                        <div class="float-right">
                            <a class="btn btn-outline-success btn-sm float-right"  href="{{ route('responsibles.index') }}"><i class="bi bi-arrow-left-square-fill"></i> Regresar </a>
                        </div>
                        <div class="text-center ms-auto">
                        <span class="card-title h4 fw-bolder"> <i class="bi bi-people-fill"></i> Crear Responsable</span>
                        </div>
                        
                    </div>
                   
                    <div class="card-body">
                        <form method="POST" action="{{ route('responsibles.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('responsible.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
