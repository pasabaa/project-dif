@extends('layouts.admin')

@section('content')
    <section class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-12">
                <div class="card mt-4 border-0">
                    <div class="card-header border-0 bg-white">
                        <div class="d-flex justify-content-between">
                            <h1 class="fw-bolder">Servicio</h1>
                            <button title="Más información" class="btn p-0 h-25 info"><i class="bi bi-info-circle-fill"></i></button>
                        </div>
                        <h4 class="fw-light">{{$service->name}}</h4>
                        <div class="d-flex gap-2">
                            <span class="badge bg-dark">{{ $service->modality->modality}}</span>
                            <span class="badge bg-dark">{{ $service->type->type}}</span>
                        </div>
                    </div>

                    <div class="card-body">
                        <p>{!!nl2br($service->description)!!}</p>
                        <div class="text-center">
                            <img class="img-fluid" src="{{asset('uploads/services/')}}{{'/'.$service->url}}" alt="">
                        </div>
                        <a class="btn btn-sm btn-dark mt-4" href="{{route('services.index')}}">Regresar</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12 more-info d-none">
                <div class="card mt-4 border-0 bg-gray-light">
                    <div class="card-header border-0 bg-gray-light">
                        <h4 class="fw-bolder">Más información</h4>
                    </div>
                    <div class="card-body">
                        <p class="fw-bolder">ID del servicio: <span class="fw-normal">{{$service->id}}</span></p>
                        <p class="fw-bolder">Nombre de la imagen: <span class="fw-normal">{{$service->url}}</span></p>
                        <p class="fw-bolder">ID de la modalidad: <span class="fw-normal">{{$service->id_modality}}</span></p>
                        <p class="fw-bolder">ID del tipo: <span class="fw-normal">{{$service->id_type}}</span></p>
                        <p class="fw-bolder">Creación: <span class="fw-normal">{{$service->created_at->translatedFormat('l, j \\de F \\de Y - h:i A');}}</span></p>
                        <p class="fw-bolder">Última actualización: <span class="fw-normal">{{$service->updated_at->translatedFormat('l, j \\de F \\de Y - h:i A');}}</span></p>
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
