@extends('layouts.admin')
@section('content')
<div class="row pt-4 mt-4">
    <div class="col-12 px-4">
        <h1>Responsables</h1>
        <div class="d-flex gap-2">
            <a class="btn btn-sm btn-light" href="{{url()->previous()}}">Regresar</a>
            <a href="{{ route('responsibles.create') }}" class="btn btn-dark btn-sm">Crear nuevo responsable</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 p-4">
        <div class="card">
            <div class="card-header">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <a class="btn btn-outline-success btn-sm" href="{{ url()->previous() }}"><i
                            class="bi bi-arrow-left-square-fill"></i> Regresar </a>

                    <span id="card_title" class="h4 fw-bolder">
                        {{ __('Responsables') }}
                    </span>

                    <div class="float-right">
                        <a href="{{ route('responsibles.create') }}" class="btn btn-outline-success btn-sm float-right"
                            data-placement="left">
                            <i class="bi bi-people-fill"></i>
                            {{ __('Crear Nuevo Responsable') }}
                        </a>
                    </div>
                </div>
            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="thead">
                            <tr>
                                <th>No</th>

                                <th>Nombre</th>
                                <th>Cargo</th>
                                <th>Área</th>
                                <th>Fecha de Asignación</th>
                                <th>Imagen</th>

                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($responsibles as $responsible)
                            <tr>
                                <td>{{ ++$i }}</td>

                                <td>{{ $responsible->name }}</td>
                                <td>{{ $responsible->charge }}</td>
                                <td>{{ $responsible->area }}</td>
                                <td>{{ $responsible->date_charge }}</td>
                                <td><img class="img-fluid" width="200" src="uploads/responsibles/{{$responsible->url }}"
                                        alt=""></td>

                                <td>
                                    <div class="d-flex flex-column gap-2 justify-content-center align-items-center">
                                        <a class="btn btn-outline-dark btn-sm"
                                            href="{{ route('responsibles.show',$responsible->id) }}"><i
                                                class="bi bi-eye-fill"></i> </a>
                                        <a class="btn btn-outline-warning btn-sm"
                                            href="{{ route('responsibles.edit',$responsible->id) }}"><i
                                                class="bi bi-pen-fill"></i> </a>

                                        <button title="Eliminar" data-bs-toggle="modal"
                                            data-bs-target="#modal-delete-{{$responsible->id}}" type="submit"
                                            class="btn btn-outline-danger btn-sm"><i
                                                class="bi bi-trash3-fill"></i></button>
                                    </div>

                                </td>
                            </tr>
                            <div class="modal fade" id="modal-delete-{{$responsible->id}}"
                                data-bs-backdrop="modal-delete-{{$responsible->id}}" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="modal-delete-{{$responsible->id}}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm">
                                    <div class="modal-content border-0">
                                        <div class="text-center p-2">
                                            <p class="fw-bolder m-0">¿Está seguro de querer <span
                                                    class="text-danger">eliminar</span> este responsable?</h1>
                                        </div>
                                        <div class="d-flex p-2 text-center justify-content-center gap-2">
                                            <button type="button" class="btn btn-sm btn-dark"
                                                data-bs-dismiss="modal">Cancelar</button>
                                            <form action="{{ route('responsibles.destroy',$responsible  ->id) }}"
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
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {!! $responsibles->links() !!}
    </div>
</div>

@endsection
