@extends('layouts.app')
@section('content')
<div class="row justify-content-start p-4 mt-4">
    <h1 class="display-4">Noticias</h1>
    <p class="text-justify">En esta sección se presentan las noticias que suscitan entorno al Sistema para el Desarrollo
        Integral de la Familia del municipio de Acámbaro.</p>
    @foreach ($notices as $notice)
    <div class="col-lg-4 col-12 mt-2">
        <div class="card border-0 h-100 h-max bg-white">
            <img class="img-card img-fluid" src="uploads/notices/{{$notice->url}}" alt="">
            <div class="card-body card-img-overlay bg-dark-overlay text-white align-items-start justify-content-between d-flex flex-column">
                <span class="badge bg-dark me-auto">{{Str::title($notice->category->categorie)}}</span>
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
                            <h1 class="card-title">{{$notice->title}}</h1>
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
    <!-- Termina modal -->
    @endforeach
</div>
<div class="p-4 pagination-sm">
    {!! $notices->links() !!}
</div>
@endsection