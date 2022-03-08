@extends('layouts.app')
@section('content')

<div class="row m-0 justify-content-around align-items-center mt-4 rounded p-4">
    <div class="col-lg-6 col-12 p-4">
        <h1 class="display-1">¡Bienvenido!</h1>
        <p class="lead">El Sistema DIF Municipal es una institución de asistencia social que permite atender las
            necesidades prioritarias de la población a través de sus áreas.</p>

    </div>
    <div class="col-lg-6 col-12 p-4">
        <div class="text-center">
            <img class="img-fluid rounded" src="{{asset('img/logo.jpg')}}" alt="">
        </div>
    </div>
</div>

<div class="row m-0 justify-content-start my-4 rounded p-4">
    <h1 class="display-6">Últimas noticias</h1>
    @foreach ($notices as $notice)
    <div class="col-lg-4 col-12 mt-2">
        <div class="card border-0 h-100 h-max bg-white">
            <img class="img-card img-fluid" src="uploads/notices/{{$notice->url}}" alt="">
            <div class="card-body card-img-overlay bg-dark-overlay text-white align-items-end justify-content-end d-flex flex-column">
                <div class="text-normal">
                    <div class="d-flex justify-content-between mb-2">
                        <div class="me-auto">
                            <h4 class="card-title text-blue m-0 fw-light">{{Str::title($notice->title)}}</h4>
                            <p class="text-muted m-0 fs-sm">{{$notice->created_at->diffForHumans();}}</p>
                        </div>
                    </div>
                    <button type="button" class="btn btn-sm btn-dark mt-2" data-bs-toggle="modal"
                        data-bs-target="#modal-{{$notice->id}}">Leer más</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade col-12" id="modal-{{$notice->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content border-0">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card border-0">
                        <div class="card-body text-justify">
                            <p class="card-title h2">{{$notice->title}}</p>
                            <p class="text-muted my-2 fs-sm">{{$notice->created_at->translatedFormat('l, j \\de F Y');}}
                            </p>
                            <p class="text-muted my-2-0 fs-sm">{{$notice->created_at->diffForHumans();}}</p>
                            <span class="badge bg-dark">{{Str::title($notice->category->categorie)}}</span>
                            <div class="text-center my-4">
                                <img class="img-fluid" src="uploads/notices/{{$notice->url}}" alt="">
                            </div>
                            <div contenteditable="false" class="card-text my-4 lead">{!! nl2br($notice->body)!!}</div>
                            <button id="close-{{$notice->id}}" type="button" class="btn-close btn-sm d-none"
                                aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

</div>

<div class="row m-0 justify-content-around align-items-center my-4 bg-white rounded p-4">
    <div class="col-12 text-center p-4">
        <h1 class="display-4">¡Sea voluntario y <span class="text-blue">done</span>!</h1>
    </div>

    <div class="col-lg-3 col-12 text-center p-4">
        <h4>Únase</h4>
        <div class="text-center">
            <i class="fs-1 bi bi-person-hearts"></i>
        </div>
        <p>Participe como voluntario y ayude a su comunidad.</p>
    </div>

    <div class="col-lg-3 col-12 text-center p-4">
        <h4>Pase la voz</h4>
        <div class="text-center">
            <i class="fs-1 bi bi-megaphone-fill"></i>
        </div>
        <p>Anime a sus familiares y amigos a participar.</p>
    </div>

    <div class="col-lg-3 col-12 text-center p-4">
        <h4>Ayuda</h4>
        <div class="text-center">
            <i class="fs-1 bi bi-balloon-heart-fill"></i>
        </div>
        <p>Puede brindar insumos para brindar asistencia alimentaria de primera instancia.</p>
    </div>

</div>

@endsection
