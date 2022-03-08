@extends('layouts.admin')

@section('content')
    <section class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-4 border-0">
                    <div class="card-header border-0 bg-white">
                        <h1 class="fw-bolder">Acerca de</h1>
                        <h4 class="fw-light">{{$about->title}}</h4>
                    </div>
                    <div class="card-body">
                        <p>{!!nl2br($about->body)!!}</p>
                        <a class="btn btn-sm btn-dark mt-4" href="{{route('abouts.index')}}">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

