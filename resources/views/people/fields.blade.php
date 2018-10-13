<!-- Nombre Field -->
<div class="form-group col-sm-6 @if($errors->has('nombre')) has-error @endif">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Apellido Field -->
<div class="form-group col-sm-6 @if($errors->has('apellido')) has-error @endif">
    {!! Form::label('apellido', 'Apellido:') !!}
    {!! Form::text('apellido', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Numero Documento Field -->
<div class="form-group col-sm-6 @if($errors->has('numero_documento')) has-error @endif">
    {!! Form::label('numero_documento', 'Numero Documento:') !!}
    {!! Form::text('numero_documento', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Telefono Contacto Field -->
<div class="form-group col-sm-6 @if($errors->has('telefono_contacto')) has-error @endif">
    {!! Form::label('telefono_contacto', 'Telefono Contacto:') !!}
    {!! Form::text('telefono_contacto', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6 @if($errors->has('email')) has-error @endif">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Ingreso Field -->
<div class="form-group col-sm-6 @if($errors->has('fecha_ingreso')) has-error @endif">
    {!! Form::label('fecha_ingreso', 'Fecha Ingreso:') !!}
    {!! Form::date('fecha_ingreso', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success block-on-click']) !!}
    <a href="{!! route('people.index') !!}" class="btn btn-default block-on-click">Cancelar</a>
</div>
