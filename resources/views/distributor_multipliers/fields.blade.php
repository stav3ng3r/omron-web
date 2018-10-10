<!-- Categoria Producto Field -->
<div class="form-group col-sm-6 @if($errors->has('categoria_producto')) has-error @endif">
    {!! Form::label('categoria_producto', 'Categoria Producto:') !!}
    {!! Form::select('categoria_producto', $categories, old('categoria_producto'), ['class' => 'form-control']) !!}
</div>

<!-- Distribuidor Field -->
<div class="form-group col-sm-6 @if($errors->has('distribuidor')) has-error @endif">
    {!! Form::label('distribuidor', 'Distribuidor:') !!}
    {!! Form::select('distribuidor', $distributors, old('distributors'), ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-6 @if($errors->has('descripcion')) has-error @endif">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::text('descripcion', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Porcentaje Field -->
<div class="form-group col-sm-6 @if($errors->has('porcentaje')) has-error @endif">
    {!! Form::label('porcentaje', 'Porcentaje:') !!}
    {!! Form::number('porcentaje', NULL, ['class' => 'form-control', 'min' => '0', 'step' => '0.1']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('distributorMultipliers.index') !!}" class="btn btn-default">Cancelar</a>
</div>
