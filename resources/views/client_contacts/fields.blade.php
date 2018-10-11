<!-- Id Cliente Field -->
<div class="form-group col-sm-6 @if($errors->has('id_cliente')) has-error @endif">
    {!! Form::label('id_cliente', 'Cliente:') !!}
    {!! Form::select('id_cliente', $clients, NULL, ['class' => 'form-control select2']) !!}
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6 @if($errors->has('nombre')) has-error @endif">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Departamento Field -->
<div class="form-group col-sm-6 @if($errors->has('departamento')) has-error @endif">
    {!! Form::label('departamento', 'Departamento:') !!}
    {!! Form::text('departamento', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6 @if($errors->has('email')) has-error @endif">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Telefono Contacto Field -->
<div class="form-group col-sm-6 @if($errors->has('telefono_contacto')) has-error @endif">
    {!! Form::label('telefono_contacto', 'Telefono Contacto:') !!}
    {!! Form::text('telefono_contacto', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('clientContacts.index') !!}" class="btn btn-default">Cancelar</a>
</div>
