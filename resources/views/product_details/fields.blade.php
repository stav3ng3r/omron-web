<!-- Numero Contactos Field -->
<div class="form-group col-sm-6 @if($errors->has('numero_contactos')) has-error @endif">
    {!! Form::label('numero_contactos', 'Numero Contactos:') !!}
    {!! Form::text('numero_contactos', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Voltaje Maximo Field -->
<div class="form-group col-sm-6 @if($errors->has('voltaje_maximo')) has-error @endif">
    {!! Form::label('voltaje_maximo', 'Voltaje Maximo:') !!}
    {!! Form::text('voltaje_maximo', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Voltaje Minimo Field -->
<div class="form-group col-sm-6 @if($errors->has('voltaje_minimo')) has-error @endif">
    {!! Form::label('voltaje_minimo', 'Voltaje Minimo:') !!}
    {!! Form::text('voltaje_minimo', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Corriente Minima Field -->
<div class="form-group col-sm-6 @if($errors->has('corriente_minima')) has-error @endif">
    {!! Form::label('corriente_minima', 'Corriente Minima:') !!}
    {!! Form::text('corriente_minima', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Corriente Maxima Field -->
<div class="form-group col-sm-6 @if($errors->has('corriente_maxima')) has-error @endif">
    {!! Form::label('corriente_maxima', 'Corriente Maxima:') !!}
    {!! Form::text('corriente_maxima', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Cantidad Entradas Field -->
<div class="form-group col-sm-6 @if($errors->has('cantidad_entradas')) has-error @endif">
    {!! Form::label('cantidad_entradas', 'Cantidad Entradas:') !!}
    {!! Form::text('cantidad_entradas', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Cantidad Salidas Field -->
<div class="form-group col-sm-6 @if($errors->has('cantidad_salidas')) has-error @endif">
    {!! Form::label('cantidad_salidas', 'Cantidad Salidas:') !!}
    {!! Form::text('cantidad_salidas', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Tipo Terminal Field -->
<div class="form-group col-sm-6 @if($errors->has('tipo_terminal')) has-error @endif">
    {!! Form::label('tipo_terminal', 'Tipo Terminal:') !!}
    {!! Form::text('tipo_terminal', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Capacidad Memoria Field -->
<div class="form-group col-sm-6 @if($errors->has('capacidad_memoria')) has-error @endif">
    {!! Form::label('capacidad_memoria', 'Capacidad Memoria:') !!}
    {!! Form::text('capacidad_memoria', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Extra1 Field -->
<div class="form-group col-sm-6 @if($errors->has('extra1')) has-error @endif">
    {!! Form::label('extra1', 'Extra1:') !!}
    {!! Form::text('extra1', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Extra2 Field -->
<div class="form-group col-sm-6 @if($errors->has('extra2')) has-error @endif">
    {!! Form::label('extra2', 'Extra2:') !!}
    {!! Form::text('extra2', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Extra3 Field -->
<div class="form-group col-sm-6 @if($errors->has('extra3')) has-error @endif">
    {!! Form::label('extra3', 'Extra3:') !!}
    {!! Form::text('extra3', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('products.show', [$product->id]) !!}" class="btn btn-default">Cancelar</a>
</div>
