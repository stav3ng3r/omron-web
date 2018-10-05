<!-- Id Producto Field -->
<div class="form-group col-sm-6 @if($errors->has('id_producto')) has-error @endif">
    {!! Form::label('id_producto', 'Id Producto:') !!}
    {!! Form::number('id_producto', null, ['class' => 'form-control']) !!}
</div>

<!-- Cantidad Field -->
<div class="form-group col-sm-6 @if($errors->has('cantidad')) has-error @endif">
    {!! Form::label('cantidad', 'Cantidad:') !!}
    {!! Form::number('cantidad', null, ['class' => 'form-control']) !!}
</div>

<!-- En Stock Field -->
<div class="form-group col-sm-6 @if($errors->has('en_stock')) has-error @endif">
    {!! Form::label('en_stock', 'En Stock:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('en_stock', false) !!}
        {!! Form::checkbox('en_stock', '1', null) !!} 1
    </label>
</div>

<!-- Cantidad Minima Field -->
<div class="form-group col-sm-6 @if($errors->has('cantidad_minima')) has-error @endif">
    {!! Form::label('cantidad_minima', 'Cantidad Minima:') !!}
    {!! Form::number('cantidad_minima', null, ['class' => 'form-control']) !!}
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

<!-- Distribuidor Field -->
<div class="form-group col-sm-6 @if($errors->has('distribuidor')) has-error @endif">
    {!! Form::label('distribuidor', 'Distribuidor:') !!}
    {!! Form::number('distribuidor', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('stocks.index') !!}" class="btn btn-default">Cancelar</a>
</div>
