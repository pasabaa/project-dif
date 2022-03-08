<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Nombre') }}
            {{ Form::text('name', $responsible->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">Campo requerido.</p>') !!}
        </div>
        <div class="form-group mt-4">
            {{ Form::label('Cargo') }}
            {{ Form::text('charge', $responsible->charge, ['class' => 'form-control' . ($errors->has('charge') ? ' is-invalid' : ''), 'placeholder' => 'Cargo']) }}
            {!! $errors->first('charge', '<div class="invalid-feedback">Campo requerido.</p>') !!}
        </div>
        <div class="form-group mt-4">
            {{ Form::label('Área') }}
            {{ Form::text('area', $responsible->area, ['class' => 'form-control' . ($errors->has('area') ? ' is-invalid' : ''), 'placeholder' => 'Área']) }}
            {!! $errors->first('area', '<div class="invalid-feedback">Campo requerido.</p>') !!}
        </div>
        <div class="form-group mt-4">
            {{ Form::label('Fecha de asignación') }}
            {{ Form::date('date_charge', $responsible->date_charge, ['class' => 'form-control' . ($errors->has('date_charge') ? ' is-invalid' : ''), 'placeholder' => 'Fecha de asignación']) }}
            {!! $errors->first('date_charge', '<div class="invalid-feedback">Campo requerido.</p>') !!}
        </div>
        <div class="form-group mt-4">
            {{ Form::label('Descripción') }}
            {{ Form::textarea('description', $responsible->description, ['class' => 'form-control, summernote' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Descripción']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">Campo requerido.</p>') !!}
        </div>
        <div class="form-group mt-4">
            {{ Form::label('Imagen') }}  <i class="bi bi-image"></i>
            {{ Form::file('url', ['onChange'=> 'loadFile(event)','class' => 'form-control' . ($errors->has('url') ? ' is-invalid' : ''), 'placeholder' => 'Imagen']) }}
            {!! $errors->first('url', '<div class="invalid-feedback">Campo requerido.</p>') !!}
                @if (!isset($responsible->url))
                <div class="content-image mt-4 d-none">
                    <p>Has seleccionado la siguiente imagen</p>
                    <img id="output" class="img-fluid" />
                </div>
                @else
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="mt-4">
                            <p>Imagen actual</p>
                            <img class="img-fluid" src="{{asset('uploads/responsibles/')}}{{'/'.$responsible->url}}" alt="">
                        
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

    </div> 
    <div class="mt-4 text-center">
        <button type="submit" class="btn btn-primary"> <i class="bi bi-check-circle-fill"></i> Guardar Cambios</button>
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