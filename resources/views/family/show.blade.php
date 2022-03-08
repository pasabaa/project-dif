@extends('layouts.admin')

@section('template_title')
    {{ $family->name ?? 'Show Family' }}
@endsection

@section('content')
    <section class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-12">
                <div class="card mt-4 border-0">
                    <div class="card-header border-0 bg-white">
                        <div class="d-flex justify-content-between">
                            <div class="text-rigth">
                                <h1 class="fw-bolder">Salud Familiar</h1>
                                <h4 class="fw-light">{{$family->name}}</h4>
                            </div>
                            <button title="Más información" class="btn p-0 h-25 info"><i
                                    class="bi bi-info-circle-fill"></i></button>
                        </div>
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
            <div class="col-lg-4 col-12 more-info d-none">
                <div class="card mt-4 border-0 bg-gray-light">
                    <div class="card-header border-0 bg-gray-light">
                        <h4 class="fw-bolder">Más información</h4>
                    </div>
                    <div class="card-body">
                        <p class="fw-bolder">ID del servicio: <span class="fw-normal">{{$family->id}}</span></p>
                        <p class="fw-bolder">ID del responsable: <span class="fw-normal">{{$family->id_responsable}}</span></p>
                        <p class="fw-bolder">Creación: <span class="fw-normal">{{$family->created_at->translatedFormat('l, j \\de F \\de Y - h:i A');}}</span></p>
                            <p class="fw-bolder">Última actualización: <span class="fw-normal">{{$family->updated_at->translatedFormat('l, j \\de F \\de Y - h:i A');}}</span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        let btnInfo = document.querySelector('.info');
        let content = document.querySelector('.more-info');
    
        btnInfo.addEventListener('click', () => {
            content.classList.toggle('d-none');
        });
    
    </script>
@endsection
