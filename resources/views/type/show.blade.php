@extends('layouts.admin')

@section('content')
    <section class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-12">
                <div class="card mt-4 border-0">
                    <div class="card-header border-0 bg-white">
                        <div class="d-flex justify-content-between">
                            <h1 class="fw-bolder">Tipo</h1>
                            <button title="Más información" class="btn p-0 h-25 info"><i class="bi bi-info-circle-fill"></i></button>
                        </div>
                    </div>

                    <div class="card-body">
                        <p>Nombre: {{$type->type}}</p>
                        <a title="Regresar" class="btn btn-sm btn-dark mt-4" href="{{route('types.index')}}">Regresar</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12 more-info d-none">
                <div class="card mt-4 border-0 bg-gray-light">
                    <div class="card-header border-0 bg-gray-light">
                        <h4 class="fw-bolder">Más información</h4>
                    </div>
                    <div class="card-body">
                        <p class="fw-bolder">ID del tipo: <span class="fw-normal">{{$type->id}}</span></p>
                        <p class="fw-bolder">Creación: <span class="fw-normal">{{date('l, j F Y - h:i A', strtotime($type->created_at));}}</span></p>
                        <p class="fw-bolder">Última actualización: <span class="fw-normal">{{date('l, j F Y - h:i A', strtotime($type->updated_at));}}</span></p>
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

