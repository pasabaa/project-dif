        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $service->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group mt-4">
            {{ Form::label('Seleccionar Tipo') }}
            {{ Form::select('id_type', $types, null, ['class' => 'form-control' . ($errors->has('id_type') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar']) }}
            {!! $errors->first('id_type', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group mt-4">
            {{ Form::label('area') }}
            {{ Form::text('area', $service->area, ['class' => 'form-control' . ($errors->has('area') ? ' is-invalid' : ''), 'placeholder' => 'Area']) }}
            {!! $errors->first('area', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group mt-4">
            {{ Form::label('Seleccionar Modalidad') }}
            {{ Form::select('id_modality', $modalities, null, ['class' => 'form-control' . ($errors->has('id_modality') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar']) }}
            {!! $errors->first('id_modality', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group mt-4">
            {{ Form::label('description') }}
            {{ Form::textarea('description', $service->description, ['class' => 'form-control, summernote' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group mt-4">
            {{ Form::label('Imagen') }}
            {{ Form::file('url', ['onChange' => 'loadFile(event)','class' => 'form-control' . ($errors->has('url') ? ' is-invalid' : '')]) }}
            {!! $errors->first('url', '<div class="invalid-feedback">Debes seleccionar una imagen</p>') !!}

            @if (!isset($service->url))
            <div class="content-image mt-4 d-none">
                <p>Has seleccionado la siguiente imagen</p>
                <img id="output" class="img-fluid" />
            </div>
            @else
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="mt-4">
                        <p>Imagen actual</p>
                        <img class="img-fluid" src="{{asset('uploads/services/')}}{{'/'.$service->url}}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="content-image mt-4 d-none">
                        <p>Imagen seleccionada</p>
                        <img id="output" class="img-fluid" />
                    </div>
                </div>
            </div>
            @endif
        </div>

        <div class="form-group mt-4">
            <div class="d-flex gap-4">
                <a class="btn btn-sm btn-light" href="{{route('services.index')}}">Regresar</a>
                <button type="submit" class="btn btn-sm btn-dark">Guardar</button>
            </div>
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