@extends('layouts.admin')

@section('content')
    <section class="container-fluid mb-4">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-12">
                <div class="card mt-4 border-0">
                    <div class="card-header border-0 bg-white">
                        <div class="d-flex justify-content-between">
                            <h1 class="fw-bolder">Noticia</h1>
                            <button title="Más información" class="btn p-0 h-25 info"><i class="bi bi-info-circle-fill"></i></button>
                        </div>
                        
                        <h4 class="fw-light">{{$notice->title}}</h4>
                        <span class="badge bg-dark">{{ $notice->category->categorie }}</span>
                    </div>

                    <div class="card-body">
                        <p>{!!nl2br($notice->body)!!}</p>
                        <div class="text-center">
                            <img class="img-fluid" src="{{asset('uploads/notices/')}}{{'/'.$notice->url}}" alt="">
                        </div>
                        <a title="Regresar" class="btn btn-sm btn-dark mt-4" href="{{route('notices.index')}}">Regresar</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12 more-info d-none">
                <div class="card mt-4 border-0 bg-gray-light">
                    <div class="card-header border-0 bg-gray-light">
                        <h4 class="fw-bolder">Más información</h4>
                    </div>
                    <div class="card-body">
                        <p class="fw-bolder">ID de la noticia: <span class="fw-normal">{{$notice->id}}</span></p>
                        <p class="fw-bolder">Nombre de la imagen: <span class="fw-normal">{{$notice->url}}</span></p>
                        <p class="fw-bolder">ID de la categoria: <span class="fw-normal">{{$notice->id_categorie}}</span></p>
                        <p class="fw-bolder">Creación: <span class="fw-normal">{{date('l, j F Y - h:i A', strtotime($notice->created_at));}}</span></p>
                        <p class="fw-bolder">Última actualización: <span class="fw-normal">{{date('l, j F Y - h:i A', strtotime($notice->updated_at));}}</span></p>
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
