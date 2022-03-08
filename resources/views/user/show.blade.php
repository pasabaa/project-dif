@extends('layouts.admin')

@section('content')
<section class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-12">
            <div class="card mt-4 border-0">
                <div class="card-header border-0 bg-white">
                    <div class="d-flex justify-content-between">
                        <h1 class="fw-bolder">Usuario</h1>
                        <button title="Más información" class="btn p-0 h-25 info"><i
                                class="bi bi-info-circle-fill"></i></button>
                    </div>
                </div>

                <div class="card-body">
                    <p class="fw-bolder">Name: <span class="fw-normal">{{ $user->name }}</span></p>
                    <p class="fw-bolder">Last Name: <span class="fw-normal">{{ $user->last_name }}</span></p>
                    <p class="fw-bolder">Phone Number: <span class="fw-normal">{{ $user->phone_number }}</span></p>
                    <p class="fw-bolder">Email: <span class="fw-normal">{{ $user->email }}</span></p>
                    <a title="Regresar" class="btn btn-sm btn-dark mt-4" href="{{route('users.index')}}">Regresar</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12 more-info d-none">
            <div class="card mt-4 border-0 bg-gray-light">
                <div class="card-header border-0 bg-gray-light">
                    <h4 class="fw-bolder">Más información</h4>
                </div>
                <div class="card-body">
                    <p class="fw-bolder">ID del usuario: <span class="fw-normal">{{$user->id}}</span></p>
                    <p class="fw-bolder">Creación: <span class="fw-normal">{{$user->created_at->translatedFormat('l, j \\de F \\de Y - h:i A');}}</span></p>
                        <p class="fw-bolder">Última actualización: <span class="fw-normal">{{$user->updated_at->translatedFormat('l, j \\de F \\de Y - h:i A');}}</span></p>
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
