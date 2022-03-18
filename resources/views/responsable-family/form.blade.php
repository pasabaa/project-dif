        
        <div class="form-group">
            {{ Form::label('Nombre') }}
            {{ Form::text('name', $responsableFamily->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre del Responsable']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="form-group mt-4">
        <div class="d-flex gap-4">
            <a class="btn btn-sm btn-light" href="{{route('responsable-family.index')}}">Regresar</a>
            <button type="submit" class="btn btn-sm btn-dark">Guardar</button>
        </div>
    </div>