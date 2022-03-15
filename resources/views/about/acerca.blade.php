@extends('layouts.app')
@section('content')
<div class="row justify-content-start p-4 mt-4">
    <h1 class="display-4">Acerca de</h1>
    <p>En esta sección se presenta información acerca del Sistema para el Desarrollo Integral de la Familia del
        municipio de Acámbaro.</p>
    @foreach ($abouts as $about)
    <div class="col-lg-4 col-12 h-100 p-0 m-0">
        <div class="card border-0 h-100 bg-transparent">
            <div class="card-body">
                <h1 class="card-title fw-light">{{$about->title}}</h1>
                <div contenteditable="false" class="content-p card-text">{!! nl2br($about->body)!!}</div>
            </div>
        </div>
    </div>

    @endforeach

</div>

@endsection
