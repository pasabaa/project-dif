       
        <div class="form-group my-4">
            {{ Form::label('Nombre') }}
            {{ Form::text('name', $contact->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">El campo es requerido</p>') !!}
        </div>
        <div class="form-group my-4">
            {{ Form::label('Correo electrónico') }}
            {{ Form::email('email', $contact->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Correo electrónico']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">El campo es requerido</p>') !!}
        </div>
        <div class="form-group my-4">
            {{ Form::label('Mensaje') }}
            {{ Form::textarea('message', $contact->message, ['class' => 'form-control' . ($errors->has('message') ? ' is-invalid' : ''), 'placeholder' => 'Mensaje']) }}
            {!! $errors->first('message', '<div class="invalid-feedback">El campo es requerido</p>') !!}
        </div>

    <div class="mt-4">
        <button type="submit" class="btn btn-light rounded-pill">Enviar</button>
    </div>

