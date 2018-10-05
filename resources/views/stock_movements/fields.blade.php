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

<!-- Id Comprobante Field -->
<div class="form-group col-sm-6 @if($errors->has('id_comprobante')) has-error @endif">
    {!! Form::label('id_comprobante', 'Id Comprobante:') !!}
    {!! Form::number('id_comprobante', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipo Movimiento Field -->
<div class="form-group col-sm-6 @if($errors->has('tipo_movimiento')) has-error @endif">
    {!! Form::label('tipo_movimiento', 'Tipo Movimiento:') !!}
    {!! Form::text('tipo_movimiento', null, ['class' => 'form-control']) !!}
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
    <a href="{!! route('stockMovements.index') !!}" class="btn btn-default">Cancelar</a>
</div>
