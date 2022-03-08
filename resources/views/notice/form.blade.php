        <div class="form-group">
            {{ Form::label('Título') }}
            {{ Form::text('title', $notice->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Título']) }}
            {!! $errors->first('title', '<div class="invalid-feedback">El campo es requerido</p>') !!}
        </div>
        <div class="form-group mt-4">
            {{ Form::label('Cuerpo de la noticia') }}
            {{ Form::textarea('body', $notice->body, ['class' => 'form-control, summernote' . ($errors->has('body') ? ' is-invalid' : '')]) }}
            {!! $errors->first('body', '<div class="invalid-feedback">El campo es requerido</p>') !!}
        </div>
        <div class="form-group mt-4">
            {{ Form::label('Categoria') }}
            {{ Form::select('id_categorie', $categories, null, ['class' => 'form-select' . ($errors->has('id_categorie') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar categoria']) }}
            {!! $errors->first('id_categorie', '<div class="invalid-feedback">El campo es requerido</p>') !!}
        </div>
        <div class="form-group mt-4">
            {{ Form::label('Imagen') }}
            {{ Form::file('url', ['onChange' => 'loadFile(event)','class' => 'form-control' . ($errors->has('url') ? ' is-invalid' : '')]) }}
            {!! $errors->first('url', '<div class="invalid-feedback">Debe seleccionar una imagen</p>') !!}

                @if (!isset($notice->url))
                <div class="content-image mt-4 d-none">
                    <p>Has seleccionado la siguiente imagen</p>
                    <img id="output" class="img-fluid" />
                </div>
                @else
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="mt-4">
                            <p class="fw-bolder">Imagen actual</p>
                            <img class="img-fluid" src="{{asset('uploads/notices/')}}{{'/'.$notice->url}}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="content-image mt-4 d-none">
                            <p class="fw-bolder">Imagen seleccionada</p>
                            <img id="output" class="img-fluid" />
                        </div>
                    </div>
                </div>
                @endif
        </div>
        <div class="form-group mt-4">
            <div class="d-flex gap-4">
                <a class="btn btn-sm btn-light" href="{{route('notices.index')}}">Regresar</a>
                <button type="submit" class="btn btn-sm btn-dark">Guardar</button>
            </div>
        </div>

        

<script>
    $('.summernote').summernote({
        tabsize: 2,
        height: 120,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['view', ['codeview']]
        ]
    });
</script>

<script>

    let showImage = document.querySelector('.content-image');

    var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
        showImage.classList.toggle('d-none');
    };

</script>