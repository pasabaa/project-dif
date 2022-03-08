@extends('layouts.admin')

@section('content')
<div class="row pt-4 mt-4">
    <div class="col-12 px-4">
        <h1>Modalidades de servicios</h1>
        <div class="d-flex gap-4">
            <a class="btn btn-sm btn-light" href="{{url()->previous()}}">Regresar</a>
            <a href="{{ route('modalities.create') }}" class="btn btn-dark btn-sm">Crear nueva modalidad de servicio</a>
        </div>
    </div>
</div>
@if (($modalities->isEmpty()))
<div class="row mt-4 pt-4">
    <div class="col-12 text-center mt-4 pt-4">
        <h1>No hay información disponible.</h1>
    </div>
</div>
@else
<div class="row">
    <div class="col-sm-12 p-4">
        <div class="card border-0">
            @if ($message = Session::get('success'))
            <div class="alert bg-dark alert-dismissible fade show p-2 border-0" role="alert">
                <p class="m-0 text-white">{{ $message }} <i class="bi bi-check-circle-fill"></i> </p>
                <button type="button" class="btn-close btn-close-white btn-sm m-0 p-2" data-bs-dismiss="alert"
                    aria-label="Close"></button>
            </div>
            @endif

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless table-hover">
                        <thead class="thead">
                            <tr>
                                <th>No</th>

                                <th class="text-center">Modalidad</th>

                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($modalities as $modality)
                            <tr>
                                <td>{{ ++$i }}</td>

                                <td class="text-center">{{ $modality->modality}}</td>

                                <td>
                                    <div class="d-flex justify-content-center align-items-center gap-2">
                                        @can('modalities.show')
                                        <a title="Ver" class="btn btn-sm btn-light "
                                            href="{{ route('modalities.show',$modality->id) }}"><i
                                                class="bi bi-eye-fill fs-6"></i></a>
                                        @endcan
                                        @can('modalities.edit')
                                        <a title="Editar" class="btn btn-sm btn-dark"
                                            href="{{ route('modalities.edit',$modality->id) }}"><i
                                                class="bi bi-pencil-fill fs-6"></i></a>
                                        @endcan
                                        @can('modalities.destroy')
                                        <button title="Eliminar" data-bs-toggle="modal"
                                            data-bs-target="#modal-delete-{{$modality->id}}" type="submit"
                                            class="btn btn-danger btn-sm"><i class="bi bi-trash-fill fs-6"></i></button>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                            @can('modalities.destroy')
                            <div class="modal fade" id="modal-delete-{{$modality->id}}"
                                data-bs-backdrop="modal-delete-{{$modality->id}}" data-bs-keyboard="false" tabindex="-1"
                                aria-labelledby="modal-delete-{{$modality->id}}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm">
                                    <div class="modal-content border-0">
                                        <div class="text-center p-2">
                                            <p class="fw-bolder m-0">¿Está seguro de querer <span
                                                    class="text-danger">eliminar</span> esta noticia?</h1>
                                        </div>
                                        <div class="d-flex p-2 text-center justify-content-center gap-2">
                                            <button type="button" class="btn btn-sm btn-dark"
                                                data-bs-dismiss="modal">Cancelar</button>
                                            <form action="{{ route('modalities.destroy',$modality->id) }}"
                                                method="POST">
                                                <div class="d-flex justify-content-around align-items-center gap-2">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Aceptar</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endcan
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {!! $modalities->links() !!}
    </div>
</div>
@endif
@endsection
