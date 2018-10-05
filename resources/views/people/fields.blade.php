<!-- Nombre Field -->
<div class="form-group col-sm-6 @if($errors->has('nombre')) has-error @endif">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Apellido Field -->
<div class="form-group col-sm-6 @if($errors->has('apellido')) has-error @endif">
    {!! Form::label('apellido', 'Apellido:') !!}
    {!! Form::text('apellido', null, ['class' => 'form-control']) !!}
</div>

<!-- Numero Documento Field -->
<div class="form-group col-sm-6 @if($errors->has('numero_documento')) has-error @endif">
    {!! Form::label('numero_documento', 'Numero Documento:') !!}
    {!! Form::text('numero_documento', null, ['class' => 'form-control']) !!}
</div>

<!-- Telefono Contacto Field -->
<div class="form-group col-sm-6 @if($errors->has('telefono_contacto')) has-error @endif">
    {!! Form::label('telefono_contacto', 'Telefono Contacto:') !!}
    {!! Form::text('telefono_contacto', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6 @if($errors->has('email')) has-error @endif">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Ingreso Field -->
<div class="form-group col-sm-6 @if($errors->has('fecha_ingreso')) has-error @endif">
    {!! Form::label('fecha_ingreso', 'Fecha Ingreso:') !!}
    {!! Form::date('fecha_ingreso', null, ['class' => 'form-control']) !!}
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
    <a href="{!! route('people.index') !!}" class="btn btn-default">Cancelar</a>
</div>
