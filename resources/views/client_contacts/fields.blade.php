<!-- Id Cliente Field -->
<div class="form-group col-sm-6 @if($errors->has('id_cliente')) has-error @endif">
    {!! Form::label('id_cliente', 'Id Cliente:') !!}
    {!! Form::number('id_cliente', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6 @if($errors->has('nombre')) has-error @endif">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Departamento Field -->
<div class="form-group col-sm-6 @if($errors->has('departamento')) has-error @endif">
    {!! Form::label('departamento', 'Departamento:') !!}
    {!! Form::text('departamento', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6 @if($errors->has('email')) has-error @endif">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Telefono Contacto Field -->
<div class="form-group col-sm-6 @if($errors->has('telefono_contacto')) has-error @endif">
    {!! Form::label('telefono_contacto', 'Telefono Contacto:') !!}
    {!! Form::text('telefono_contacto', null, ['class' => 'form-control']) !!}
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

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('clientContacts.index') !!}" class="btn btn-default">Cancelar</a>
</div>
