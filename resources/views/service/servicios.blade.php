@extends('layouts.app')
@section('content')
<div class="row justify-content-between p-4 mt-4">
    <h1 class="display-4">Servicios</h1>
    <p class="text-justify">
        Favorecer el desarrollo de vínculos humanos saludables y fomentar cambios sociales que deriven en un mayor
        bienestar para las personas.
        La aplicación efectiva, humana y profesional de la cédula socioeconómica para conocer a fondo el entorno
        económico,
        familiar, médico y laboral del solicitante, a fin de identificar las necesidades y el nivel de
        vulnerabilidad del
        usuario. Así mismo canalizar y gestionar a las diferentes instituciones de asistencia social.</p>
    @foreach ($services as $service)
    <div class="col-lg-4 col-12 mt-2">
        <div class="card border-0 h-100 bg-white">
            <img class="img-fluid" src="uploads/services/{{$service->url}}" alt="">
            <div class="card-body card-img-overlay bg-dark-overlay text-white align-items-start justify-content-between d-flex flex-column">
                <div class="d-flex me-auto gap-2">
                    <span class="badge bg-dark me-auto">{{Str::title($service->modality->modality)}}</span>
                    <span class="badge bg-dark me-auto">{{Str::title($service->type->type)}}</span>
                </div>
                <div class="text-normal">
                    <div class="d-flex justify-content-between mb-2">
                        <div class="me-auto">
                            <h4 class="card-title text-blue m-0 fw-light">{{Str::title($service->name)}}</h4>
                        </div>
                    </div>
                    <button type="button" class="btn btn-sm btn-dark mt-2" data-bs-toggle="modal"
                        data-bs-target="#modal-{{$service->id}}">Leer más</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal-{{$service->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content border-0">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card border-0">
                        <div class="card-body text-justify">
                            <h1 class="card-title">{{$service->name}}</h1>
                            <div class="d-flex gap-2">
                                <span class="badge bg-dark">{{$service->modality->modality}}</span>
                                <span class="badge bg-dark">{{$service->type->type}}</span>
                            </div>
                            <div class="text-center my-4">
                                <img class="img-fluid" src="uploads/services/{{$service->url }}" alt="">
                            </div>
                            <div class="mt-2" contenteditable="false" class="card-text">{!!nl2br($service->description)!!}</div>
                            <button id="close-{{$service->id}}" type="button" class="btn-close btn-sm d-none"
                                aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endforeach

</div>

{!! $services->links() !!}


@endsection
