<!-- Descripcion Field -->
<div class="form-group col-sm-6 @if($errors->has('descripcion')) has-error @endif">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Pais Field -->
<div class="form-group col-sm-6 @if($errors->has('pais')) has-error @endif">
    {!! Form::label('pais', 'Pais:') !!}
    {!! Form::number('pais', null, ['class' => 'form-control']) !!}
</div>

<!-- Ciudad Field -->
<div class="form-group col-sm-6 @if($errors->has('ciudad')) has-error @endif">
    {!! Form::label('ciudad', 'Ciudad:') !!}
    {!! Form::number('ciudad', null, ['class' => 'form-control']) !!}
</div>

<!-- Direccion Entrega Field -->
<div class="form-group col-sm-6 @if($errors->has('direccion_entrega')) has-error @endif">
    {!! Form::label('direccion_entrega', 'Direccion Entrega:') !!}
    {!! Form::text('direccion_entrega', null, ['class' => 'form-control']) !!}
</div>

<!-- Telefono Entrega Field -->
<div class="form-group col-sm-6 @if($errors->has('telefono_entrega')) has-error @endif">
    {!! Form::label('telefono_entrega', 'Telefono Entrega:') !!}
    {!! Form::text('telefono_entrega', null, ['class' => 'form-control']) !!}
</div>

<!-- Contacto Entrega Field -->
<div class="form-group col-sm-6 @if($errors->has('contacto_entrega')) has-error @endif">
    {!! Form::label('contacto_entrega', 'Contacto Entrega:') !!}
    {!! Form::text('contacto_entrega', null, ['class' => 'form-control']) !!}
</div>

<!-- Cliente Field -->
<div class="form-group col-sm-6 @if($errors->has('cliente')) has-error @endif">
    {!! Form::label('cliente', 'Cliente:') !!}
    {!! Form::number('cliente', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('clientAddresses.index') !!}" class="btn btn-default">Cancelar</a>
</div>
