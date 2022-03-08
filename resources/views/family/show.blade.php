@extends('layouts.admin')

@section('template_title')
    {{ $family->name ?? 'Show Family' }}
@endsection

@section('content')
    <section class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-4 border-0">
                    <div class="card-header border-0 bg-white">
                        <h1 class="fw-bolder">Salud Familiar</h1>
                        <h4 class="fw-light">{{$family->name}}</h4>
                    </div>

                    <div class="card-body">
                        <p>Responsable: {{$family->responsableFamily->name }}</p>
                        <p class="font-sm">Objetivo: {!!nl2br($family->target)!!}</p>
                        <p>Dirigido a: {!!nl2br($family->addressed)!!}</p>
                        <p>Requerimientos: {!!nl2br($family->requirements)!!}</p>
                        <p>Télefono: {{$family->phone_number}}</p>
                        <a class="btn btn-sm btn-dark mt-4" href="{{route('families.index')}}">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
