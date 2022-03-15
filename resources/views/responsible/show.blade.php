@extends('layouts.admin')

@section('template_title')
    {{ $responsible->name ?? 'Show Responsible' }}
@endsection

@section('content')
<section class="container-fluid mb-4">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-12">
            <div class="card mt-4 border-0">
                <div class="card-header border-0 bg-white">
                    <div class="d-flex justify-content-between">
                        <h1 class="fw-bolder">Responsable</h1>
                        <button title="Más información" class="btn p-0 h-25 info"><i class="bi bi-info-circle-fill"></i></button>
                    </div>
                    <h4 class="fw-light">{{$responsible->name}}</h4>
                </div>

                <div class="card-body">
                    <div class="text-center my-4">
                        <img class="img-fluid" src="{{asset('uploads/responsibles/')}}{{'/'.$responsible->url}}" alt="">
                    </div>
                    <p class="fw-bolder">Cargo: <span class="fw-normal">{{$responsible->charge}}</span></p>
                    <p class="fw-bolder">Área: <span class="fw-normal">{{$responsible->area}}</span></p>
                    <p class="fw-bolder">Fecha de asignación: <span class="fw-normal">{{$responsible->date_charge }}</span></p>
                    <p class="fw-bolder">Descripción:</p>
                    <p>{!!nl2br($responsible->description)!!}</p>
                    <a title="Regresar" class="btn btn-sm btn-dark mt-4" href="{{route('responsibles.index')}}">Regresar</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12 more-info d-none">
            <div class="card mt-4 border-0 bg-gray-light">
                <div class="card-header border-0 bg-gray-light">
                    <h4 class="fw-bolder">Más información</h4>
                </div>
                <div class="card-body">
                    <p class="fw-bolder">ID de la noticia: <span class="fw-normal">{{$responsible->id}}</span></p>
                    <p class="fw-bolder">Nombre de la imagen: <span class="fw-normal">{{$responsible->url}}</span></p>
                    <p class="fw-bolder">ID de la categoria: <span class="fw-normal">{{$responsible->id_categorie}}</span></p>
                    <p class="fw-bolder">Creación: <span class="fw-normal">{{$responsible->created_at->translatedFormat('l, j \\de F \\de Y - h:i A');}}</span></p>
                    <p class="fw-bolder">Última actualización: <span class="fw-normal">{{$responsible->updated_at->translatedFormat('l, j \\de F \\de Y - h:i A');}}</span></p>
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
