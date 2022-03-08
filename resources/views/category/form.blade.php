        <div class="form-group">
            {{ Form::label('Categoria') }}
            {{ Form::text('categorie', $category->categorie, ['class' => 'form-control' . ($errors->has('categorie') ? ' is-invalid' : ''), 'placeholder' => 'Nombre de la categoria']) }}
            {!! $errors->first('categorie', '<div class="invalid-feedback">:message</p>') !!}
        </div>

        <div class="form-group mt-4">
            <div class="d-flex gap-4">
                <a class="btn btn-sm btn-light" href="{{route('categories.index')}}">Regresar</a>
                <button type="submit" class="btn btn-sm btn-dark">Submit</button>
            </div>
        </div>