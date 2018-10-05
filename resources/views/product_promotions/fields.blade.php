<!-- Id Producto Field -->
<div class="form-group col-sm-6 @if($errors->has('id_producto')) has-error @endif">
    {!! Form::label('id_producto', 'Id Producto:') !!}
    {!! Form::number('id_producto', null, ['class' => 'form-control']) !!}
</div>

<!-- Desde Field -->
<div class="form-group col-sm-6 @if($errors->has('desde')) has-error @endif">
    {!! Form::label('desde', 'Desde:') !!}
    {!! Form::date('desde', null, ['class' => 'form-control']) !!}
</div>

<!-- Hasta Field -->
<div class="form-group col-sm-6 @if($errors->has('hasta')) has-error @endif">
    {!! Form::label('hasta', 'Hasta:') !!}
    {!! Form::date('hasta', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Creacion Field -->
<div class="form-group col-sm-6 @if($errors->has('fecha_creacion')) has-error @endif">
    {!! Form::label('fecha_creacion', 'Fecha Creacion:') !!}
    {!! Form::date('fecha_creacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Distribuidor Field -->
<div class="form-group col-sm-6 @if($errors->has('distribuidor')) has-error @endif">
    {!! Form::label('distribuidor', 'Distribuidor:') !!}
    {!! Form::number('distribuidor', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('productPromotions.index') !!}" class="btn btn-default">Cancelar</a>
</div>
