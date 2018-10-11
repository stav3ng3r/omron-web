<!-- Id Persona Field -->
<div class="form-group col-sm-6 @if($errors->has('id_persona')) has-error @endif">
    {!! Form::label('id_persona', 'Id Persona:') !!}
    {!! Form::number('id_persona', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Role Field -->
<div class="form-group col-sm-6 @if($errors->has('id_role')) has-error @endif">
    {!! Form::label('id_role', 'Id Role:') !!}
    {!! Form::number('id_role', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Tipo Usuario Field -->
<div class="form-group col-sm-6 @if($errors->has('id_tipo_usuario')) has-error @endif">
    {!! Form::label('id_tipo_usuario', 'Id Tipo Usuario:') !!}
    {!! Form::number('id_tipo_usuario', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6 @if($errors->has('password')) has-error @endif">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- Usuario Field -->
<div class="form-group col-sm-6 @if($errors->has('usuario')) has-error @endif">
    {!! Form::label('usuario', 'Usuario:') !!}
    {!! Form::text('usuario', null, ['class' => 'form-control']) !!}
</div>

<!-- Bloqueado Field -->
<div class="form-group col-sm-6 @if($errors->has('bloqueado')) has-error @endif">
    {!! Form::label('bloqueado', 'Bloqueado:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('bloqueado', false) !!}
        {!! Form::checkbox('bloqueado', '1', null) !!} 1
    </label>
</div>

<!-- Resetear Password Field -->
<div class="form-group col-sm-6 @if($errors->has('resetear_password')) has-error @endif">
    {!! Form::label('resetear_password', 'Resetear Password:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('resetear_password', false) !!}
        {!! Form::checkbox('resetear_password', '1', null) !!} 1
    </label>
</div>

<!-- Fecha Ultimo Login Field -->
<div class="form-group col-sm-6 @if($errors->has('fecha_ultimo_login')) has-error @endif">
    {!! Form::label('fecha_ultimo_login', 'Fecha Ultimo Login:') !!}
    {!! Form::date('fecha_ultimo_login', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Creacion Field -->
<div class="form-group col-sm-6 @if($errors->has('fecha_creacion')) has-error @endif">
    {!! Form::label('fecha_creacion', 'Fecha Creacion:') !!}
    {!! Form::date('fecha_creacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Actualizacion Field -->
<div class="form-group col-sm-6 @if($errors->has('fecha_actualizacion')) has-error @endif">
    {!! Form::label('fecha_actualizacion', 'Fecha Actualizacion:') !!}
    {!! Form::date('fecha_actualizacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Borrado Field -->
<div class="form-group col-sm-6 @if($errors->has('fecha_borrado')) has-error @endif">
    {!! Form::label('fecha_borrado', 'Fecha Borrado:') !!}
    {!! Form::date('fecha_borrado', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6 @if($errors->has('email')) has-error @endif">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('usersApps.index') !!}" class="btn btn-default">Cancelar</a>
</div>
