        
        <div class="form-group">
            {{ Form::label('Título') }}
            {{ Form::text('title', $about->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Título']) }}
            {!! $errors->first('title', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group mt-4">
            {{ Form::label('Cuerpo') }}
            {{ Form::textarea('body', $about->body, ['class' => 'form-control, summernote' . ($errors->has('body') ? ' is-invalid' : ''), 'placeholder' => 'Cuerpo']) }}
            {!! $errors->first('body', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    <div class="form-group mt-4">
        <div class="d-flex gap-4">
            <a class="btn btn-sm btn-light" href="{{route('abouts.index')}}">Regresar</a>
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