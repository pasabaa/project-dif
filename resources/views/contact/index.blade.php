@extends('layouts.admin')

@section('content')
<div class="row pt-4 mt-4">
    <div class="col-12 px-4">
        <h1>Contacto</h1>
        <a class="btn btn-sm btn-light" href="{{url()->previous()}}">Regresar</a>

    </div>
</div>
@if (($contacts->isEmpty()))
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
                                <th>ID</th>

                                <th>Nombre</th>
                                <th>Correo electrónico</th>
                                <th>Mensaje</th>

                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                            <tr>
                                <td>{{ ++$i }}</td>

                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->message }}</td>

                                <td>
                                    <div class="d-flex justify-content-center align-items-center gap-2">
                                        @can('notices.show')
                                        <a class="btn btn-sm btn-light "
                                            href="{{ route('contacts.show',$contact->id) }}"><i
                                                class="bi bi-eye-fill fs-6"></i></a>
                                        @endcan
                                        @can('notices.destroy')
                                        <button title="Eliminar" data-bs-toggle="modal"
                                            data-bs-target="#modal-delete-{{$contact->id}}" type="submit"
                                            class="btn btn-danger btn-sm"><i class="bi bi-trash-fill fs-6"></i></button>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                             <!-- Modal -->
                             <div class="modal fade" id="modal-delete-{{$contact->id}}"
                                data-bs-backdrop="modal-delete-{{$contact->id}}" data-bs-keyboard="false" tabindex="-1"
                                aria-labelledby="modal-delete-{{$contact->id}}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm">
                                    <div class="modal-content border-0">
                                        <div class="text-center p-2">
                                            <p class="fw-bolder m-0">¿Está seguro de querer <span
                                                    class="text-danger">eliminar</span> esta información?</h1>
                                        </div>
                                        <div class="d-flex p-2 text-center justify-content-center gap-2">
                                            <button type="button" class="btn btn-sm btn-dark"
                                                data-bs-dismiss="modal">Cancelar</button>
                                            <form action="{{ route('contacts.destroy',$contact->id) }}" method="POST">
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
        {!! $contacts->links() !!}
    </div>
</div>
@endif
@endsection
