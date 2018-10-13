<!-- Descripcion Field -->
<div class="form-group col-sm-6 @if($errors->has('descripcion')) has-error @endif">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::textarea('descripcion', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Direccion Entrega Field -->
<div class="form-group col-sm-6 @if($errors->has('direccion_entrega')) has-error @endif">
    {!! Form::label('direccion_entrega', 'Direccion Entrega:') !!}
    {!! Form::textarea('direccion_entrega', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Pais Field -->
<div class="form-group col-sm-6 @if($errors->has('pais')) has-error @endif">
    {!! Form::label('pais', 'Pais:') !!}
    {!! Form::select('pais', $countries, NULL, ['class' => 'form-control select2']) !!}
</div>

<!-- Ciudad Field -->
<div class="form-group col-sm-6 @if($errors->has('ciudad')) has-error @endif">
    {!! Form::label('ciudad', 'Ciudad:') !!}
    {!! Form::select('ciudad', $cities, NULL, ['class' => 'form-control select2']) !!}
</div>


<!-- Telefono Entrega Field -->
<div class="form-group col-sm-6 @if($errors->has('telefono_entrega')) has-error @endif">
    {!! Form::label('telefono_entrega', 'Telefono Entrega:') !!}
    {!! Form::text('telefono_entrega', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Contacto Entrega Field -->
<div class="form-group col-sm-6 @if($errors->has('contacto_entrega')) has-error @endif">
    {!! Form::label('contacto_entrega', 'Contacto Entrega:') !!}
    {!! Form::text('contacto_entrega', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Cliente Field -->
<div class="form-group col-sm-6 @if($errors->has('cliente')) has-error @endif">
    {!! Form::label('cliente', 'Cliente:') !!}
    {!! Form::select('cliente', $clients, NULL, ['class' => 'form-control select2']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success block-on-click']) !!}
    <a href="{!! route('clientAddresses.index') !!}" class="btn btn-default block-on-click">Cancelar</a>
</div>