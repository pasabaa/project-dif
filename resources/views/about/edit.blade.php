@extends('layouts.admin')

@section('content')
    <section class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">

                @includeif('partials.errors')

                <div class="card border-0">
                    <div class="card-header border-0 bg-white">
                        <h1 class="fw-bolder">Editar</h1>
                        <h4 class="fw-light">{{$about->title}}</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('abouts.update', $about->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('about.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
