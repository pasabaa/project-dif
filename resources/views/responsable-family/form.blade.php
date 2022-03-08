        
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $responsableFamily->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="form-group mt-4">
        <div class="d-flex gap-4">
            <a class="btn btn-sm btn-light" href="{{route('responsable-family.index')}}">Regresar</a>
            <button type="submit" class="btn btn-sm btn-dark">Submit</button>
        </div>
    </div>