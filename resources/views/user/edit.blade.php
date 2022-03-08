@extends('layouts.admin')

@section('content')
    <section class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">

                @includeif('partials.errors')

                <div class="card mt-4 border-0">
                    <div class="card-header border-0 bg-white">
                        <h1 class="card-title">Editar usuario</h1>
                        <h4 class="fw-ligth">{{$user->name}}</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('users.update', $user->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('user.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
