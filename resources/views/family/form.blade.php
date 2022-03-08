        <div class="form-group">
            {{ Form::label('Nombre') }}
            {{ Form::text('name', $family->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group mt-4">
            {{ Form::label('Objetivo') }}
            {{ Form::textarea('target', $family->target, ['class' => 'form-control, summernote' . ($errors->has('target') ? ' is-invalid' : ''), 'placeholder' => 'Objetivo']) }}
            {!! $errors->first('target', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group mt-4">
            {{ Form::label('Dirigido a') }}
            {{ Form::textarea('addressed', $family->addressed, ['class' => 'form-control, summernote' . ($errors->has('addressed') ? ' is-invalid' : ''), 'placeholder' => 'Dirigido a']) }}
            {!! $errors->first('addressed', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group mt-4">
            {{ Form::label('Requerimientos') }}
            {{ Form::textarea('requirements', $family->requirements, ['class' => 'form-control, summernote' . ($errors->has('requirements') ? ' is-invalid' : ''), 'placeholder' => 'Requerimientos']) }}
            {!! $errors->first('requirements', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group mt-4">
            {{ Form::label('Télefono') }}
            {{ Form::text('phone_number', $family->phone_number, ['class' => 'form-control' . ($errors->has('phone_number') ? ' is-invalid' : ''), 'placeholder' => 'Télefono']) }}
            {!! $errors->first('phone_number', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group mt-4">
            {{ Form::label('Responsable') }}
            {{ Form::select('id_responsable', $responsables, null, ['class' => 'form-select' . ($errors->has('id_responsable') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar un responsable']) }}
            {!! $errors->first('id_responsable', '<div class="invalid-feedback">:message</p>') !!}
        </div>

        <div class="form-group mt-4">
            <div class="d-flex gap-4">
                <a class="btn btn-sm btn-light" href="{{route('families.index')}}">Regresar</a>
                <button type="submit" class="btn btn-sm btn-dark">Submit</button>
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