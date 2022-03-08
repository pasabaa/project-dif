@extends('layouts.admin')

@section('template_title')
    Modificar Responsable
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
                        <div class="float text-center ms-auto">
                            <h4 class="fw-bolder">  <i class="bi bi-tools"></i>  Modificar Responsable</h4>
                        </div>
                        
                    </div>
                    </div>
                   
                   
                    <div class="card-body">
                        <form method="POST" action="{{ route('responsibles.update', $responsible->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('responsible.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
