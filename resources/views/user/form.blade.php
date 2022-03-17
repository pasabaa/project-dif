<div class="form-group">
    {{ Form::label('Nombre') }}
    {{ Form::text('name', $user->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
    {!! $errors->first('name', '<div class="invalid-feedback">El campo es requerido</p>') !!}
</div>
<div class="form-group mt-4">
    {{ Form::label('Apellidos') }}
    {{ Form::text('last_name', $user->last_name, ['class' => 'form-control' . ($errors->has('last_name') ? ' is-invalid' : ''), 'placeholder' => 'Apellidos']) }}
    {!! $errors->first('last_name', '<div class="invalid-feedback">El campo es requerido</p>') !!}
</div>
<div class="form-group mt-4">
    {{ Form::label('Télefono') }}
    {{ Form::text('phone_number', $user->phone_number, ['class' => 'form-control' . ($errors->has('phone_number') ? ' is-invalid' : ''), 'placeholder' => 'Télefono']) }}
    {!! $errors->first('phone_number', '<div class="invalid-feedback">El campo es requerido</p>') !!}
</div>
<div class="form-group mt-4">
    {{ Form::label('Correo electrónico') }}
    {{ Form::text('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Correo electrónico']) }}
    {!! $errors->first('email', '<div class="invalid-feedback">El campo es requerido o el correo ya existe</p>') !!}
</div>
<div class="form-group mt-4">
    {{ Form::label('password') }}
    {{ Form::text('password', $user->password, ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'Contraseña']) }}
    {!! $errors->first('password', '<div class="invalid-feedback">El campo es requerido</p>') !!}
</div>
<div class="form-group mt-4">
    <div class="d-flex gap-4">
        <a class="btn btn-sm btn-light" href="{{route('users.index')}}">Regresar</a>
        <button type="submit" class="btn btn-sm btn-dark">Guardar</button>
    </div>
</div>

        

