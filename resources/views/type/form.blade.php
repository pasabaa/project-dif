<div class="form-group">
    {{ Form::label('Tipo') }}
    {{ Form::text('type', $type->type, ['class' => 'form-control' . ($errors->has('type') ? ' is-invalid' : ''), 'placeholder' => 'Nombre del tipo']) }}
    {!! $errors->first('type', '<div class="invalid-feedback">:message</p>') !!}
</div>

<div class="form-group mt-4">
    <div class="d-flex gap-4">
        <a class="btn btn-sm btn-light" href="{{route('types.index')}}">Regresar</a>
        <button type="submit" class="btn btn-sm btn-dark">Submit</button>
    </div>
</div>