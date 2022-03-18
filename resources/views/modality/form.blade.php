<div class="form-group">
    {{ Form::label('Tipo') }}
    {{ Form::text('modality', $modality->modality, ['class' => 'form-control' . ($errors->has('modality') ? ' is-invalid' : ''), 'placeholder' => 'Nombre de la modalidad']) }}
    {!! $errors->first('modality', '<div class="invalid-feedback">:message</p>') !!}
</div>

<div class="form-group mt-4">
    <div class="d-flex gap-4">
        <a class="btn btn-sm btn-light" href="{{route('modalities.index')}}">Regresar</a>
        <button type="submit" class="btn btn-sm btn-dark">Guardar</button>
    </div>
</div>