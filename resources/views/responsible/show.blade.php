@extends('layouts.admin')

@section('template_title')
    {{ $responsible->name ?? 'Show Responsible' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <div class="float-right">
                            <a class="btn btn-outline-success btn-sm float-right"  href="{{ route('responsibles.index') }}"><i class="bi bi-arrow-left-square-fill"></i> Regresar </a>
                        </div>
                        <div class="float text-center ms-auto">
                            <span class="card-title h4 fw-bolder"> <i class="bi bi-eye-fill"></i> Mostrar Responsable</span>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $responsible->name }}
                        </div>
                        <div class="form-group mt-4">
                            <strong>Cargo:</strong>
                            {{ $responsible->charge }}
                        </div>
                        <div class="form-group mt-4">
                            <strong>Área:</strong>
                            {{ $responsible->area }}
                        </div>
                        <div class="form-group mt-4">
                            <strong>Fecha de Asignación:</strong>
                            {{ $responsible->date_charge }}
                        </div>
                        <div class="form-group mt-4">
                            <strong>Descripción:</strong>
                            {!! nl2br($responsible->description)!!}
                        </div>
                        <div class="form-group d-flex flex-column mt-4">
                            <strong>Imagen:</strong>
                            <img class="img-fluid" width="200" src="{{asset('uploads/responsibles/')}}{{'/'.$responsible->url}}" alt="">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
