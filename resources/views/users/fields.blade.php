<!-- Name Field -->
<div class="form-group col-sm-6 @if($errors->has('name')) has-error @endif">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Username Field -->
<div class="form-group col-sm-6 @if($errors->has('username')) has-error @endif">
    {!! Form::label('username', 'Usuario:') !!}
    {!! Form::text('username', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6 @if($errors->has('email')) has-error @endif">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Role Field -->
<div class="form-group col-sm-6 @if($errors->has('role')) has-error @endif">
    {!! Form::label('role', 'Rol de Usuario:') !!}
    {!! Form::select('role', $roles, NULL, ['class' => 'form-control select2']) !!}
</div>

<hr>

<!-- Password Field -->
<div class="form-group col-sm-6 @if($errors->has('password')) has-error @endif">
    {!! Form::label('password', 'Contraseña:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- Confirm Password Field -->
<div class="form-group col-sm-6 @if($errors->has('password_confirmation')) has-error @endif">
    {!! Form::label('password_confirmation', 'Confirmar Contraseña:') !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
</div>

<hr>

<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-default">Cancelar</a>
</div>