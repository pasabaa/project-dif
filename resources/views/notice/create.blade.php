@extends('layouts.admin')

@section('content')
<section class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">

                @includeif('partials.errors')

                <div class="card mt-4 border-0">
                    <div class="card-header border-0 bg-white">
                        <h1 class="fw-bolder">Crear Noticia</h1>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('notices.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('notice.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
