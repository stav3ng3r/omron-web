<!-- Codigo Producto Principal Field -->
<div class="form-group col-sm-6 @if($errors->has('codigo_producto_principal')) has-error @endif">
    {!! Form::label('codigo_producto_principal', 'Codigo Producto Principal:') !!}
    {!! Form::text('codigo_producto_principal', null, ['class' => 'form-control']) !!}
</div>

<!-- Codigo Producto Accesorio Field -->
<div class="form-group col-sm-6 @if($errors->has('codigo_producto_accesorio')) has-error @endif">
    {!! Form::label('codigo_producto_accesorio', 'Codigo Producto Accesorio:') !!}
    {!! Form::text('codigo_producto_accesorio', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('productAccessories.index') !!}" class="btn btn-default">Cancelar</a>
</div>
