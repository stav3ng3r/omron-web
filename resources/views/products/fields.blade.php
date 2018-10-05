<!-- Nombre Field -->
<div class="form-group col-sm-6 @if($errors->has('nombre')) has-error @endif">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-6 @if($errors->has('descripcion')) has-error @endif">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Codigo Field -->
<div class="form-group col-sm-6 @if($errors->has('codigo')) has-error @endif">
    {!! Form::label('codigo', 'Codigo:') !!}
    {!! Form::text('codigo', null, ['class' => 'form-control']) !!}
</div>

<!-- Codigo Barra Field -->
<div class="form-group col-sm-6 @if($errors->has('codigo_barra')) has-error @endif">
    {!! Form::label('codigo_barra', 'Codigo Barra:') !!}
    {!! Form::text('codigo_barra', null, ['class' => 'form-control']) !!}
</div>

<!-- Activo Field -->
<div class="form-group col-sm-6 @if($errors->has('activo')) has-error @endif">
    {!! Form::label('activo', 'Activo:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('activo', false) !!}
        {!! Form::checkbox('activo', '1', null) !!} 1
    </label>
</div>

<!-- Id Producto Tipo Field -->
<div class="form-group col-sm-6 @if($errors->has('id_producto_tipo')) has-error @endif">
    {!! Form::label('id_producto_tipo', 'Id Producto Tipo:') !!}
    {!! Form::number('id_producto_tipo', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Producto Marca Field -->
<div class="form-group col-sm-6 @if($errors->has('id_producto_marca')) has-error @endif">
    {!! Form::label('id_producto_marca', 'Id Producto Marca:') !!}
    {!! Form::number('id_producto_marca', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Producto Categoria Field -->
<div class="form-group col-sm-6 @if($errors->has('id_producto_categoria')) has-error @endif">
    {!! Form::label('id_producto_categoria', 'Id Producto Categoria:') !!}
    {!! Form::number('id_producto_categoria', null, ['class' => 'form-control']) !!}
</div>

<!-- Precio Venta Field -->
<div class="form-group col-sm-6 @if($errors->has('precio_venta')) has-error @endif">
    {!! Form::label('precio_venta', 'Precio Venta:') !!}
    {!! Form::number('precio_venta', null, ['class' => 'form-control']) !!}
</div>

<!-- Tiene Imagen Field -->
<div class="form-group col-sm-6 @if($errors->has('tiene_imagen')) has-error @endif">
    {!! Form::label('tiene_imagen', 'Tiene Imagen:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('tiene_imagen', false) !!}
        {!! Form::checkbox('tiene_imagen', '1', null) !!} 1
    </label>
</div>

<!-- Path Imagen Field -->
<div class="form-group col-sm-6 @if($errors->has('path_imagen')) has-error @endif">
    {!! Form::label('path_imagen', 'Path Imagen:') !!}
    {!! Form::text('path_imagen', null, ['class' => 'form-control']) !!}
</div>

<!-- Imagen Field -->
<div class="form-group col-sm-6 @if($errors->has('imagen')) has-error @endif">
    {!! Form::label('imagen', 'Imagen:') !!}
    {!! Form::text('imagen', null, ['class' => 'form-control']) !!}
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

<!-- Fecha Borrado Field -->
<div class="form-group col-sm-6 @if($errors->has('fecha_borrado')) has-error @endif">
    {!! Form::label('fecha_borrado', 'Fecha Borrado:') !!}
    {!! Form::date('fecha_borrado', null, ['class' => 'form-control']) !!}
</div>

<!-- Precio Costo Field -->
<div class="form-group col-sm-6 @if($errors->has('precio_costo')) has-error @endif">
    {!! Form::label('precio_costo', 'Precio Costo:') !!}
    {!! Form::number('precio_costo', null, ['class' => 'form-control']) !!}
</div>

<!-- Peso Field -->
<div class="form-group col-sm-6 @if($errors->has('peso')) has-error @endif">
    {!! Form::label('peso', 'Peso:') !!}
    {!! Form::number('peso', null, ['class' => 'form-control']) !!}
</div>

<!-- Precio Flete Field -->
<div class="form-group col-sm-6 @if($errors->has('precio_flete')) has-error @endif">
    {!! Form::label('precio_flete', 'Precio Flete:') !!}
    {!! Form::number('precio_flete', null, ['class' => 'form-control']) !!}
</div>

<!-- Precio Despacho Field -->
<div class="form-group col-sm-6 @if($errors->has('precio_despacho')) has-error @endif">
    {!! Form::label('precio_despacho', 'Precio Despacho:') !!}
    {!! Form::number('precio_despacho', null, ['class' => 'form-control']) !!}
</div>

<!-- Precio Costo Con Impuestos Field -->
<div class="form-group col-sm-6 @if($errors->has('precio_costo_con_impuestos')) has-error @endif">
    {!! Form::label('precio_costo_con_impuestos', 'Precio Costo Con Impuestos:') !!}
    {!! Form::number('precio_costo_con_impuestos', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('products.index') !!}" class="btn btn-default">Cancelar</a>
</div>
