<div class="row">
    <!-- Nombre Field -->
    <div class="form-group col-sm-6 @if($errors->has('nombre')) has-error @endif">
        {!! Form::label('nombre', 'Nombre:') !!}
        {!! Form::text('nombre', NULL, ['class' => 'form-control']) !!}
    </div>

    <!-- Codigo Field -->
    <div class="form-group col-sm-6 @if($errors->has('codigo')) has-error @endif">
        {!! Form::label('codigo', 'Codigo:') !!}
        {!! Form::text('codigo', NULL, ['class' => 'form-control']) !!}
    </div>

    <!-- Descripcion Field -->
    <div class="form-group col-sm-6 @if($errors->has('descripcion')) has-error @endif">
        {!! Form::label('descripcion', 'Descripcion:') !!}
        {!! Form::textarea('descripcion', NULL, ['class' => 'form-control']) !!}
    </div>

    <!-- Id Producto Tipo Field -->
    <div class="form-group col-sm-6 @if($errors->has('id_producto_tipo')) has-error @endif">
        {!! Form::label('id_producto_tipo', 'Id Producto Tipo:') !!}
        {!! Form::select('id_producto_tipo', $types, old('id_producto_tipo'), ['class' => 'form-control']) !!}
    </div>

    <!-- Id Producto Marca Field -->
    <div class="form-group col-sm-6 @if($errors->has('id_producto_marca')) has-error @endif">
        {!! Form::label('id_producto_marca', 'Id Producto Marca:') !!}
        {!! Form::select('id_producto_marca', $brands, old('id_producto_marca'), ['class' => 'form-control']) !!}
    </div>

    <!-- Id Producto Categoria Field -->
    <div class="form-group col-sm-6 @if($errors->has('id_producto_categoria')) has-error @endif">
        {!! Form::label('id_producto_categoria', 'Id Producto Categoria:') !!}
        {!! Form::select('id_producto_categoria', $categories, old('id_producto_categoria'), ['class' => 'form-control']) !!}
    </div>

    <!-- Precio Costo Field -->
    <div class="form-group col-sm-6 @if($errors->has('precio_costo')) has-error @endif">
        {!! Form::label('precio_costo', 'Precio Costo:') !!}
        {!! Form::number('precio_costo', NULL, ['class' => 'form-control', 'step' => '0.01']) !!}
    </div>

    <!-- Precio Venta Field -->
    <div class="form-group col-sm-6 @if($errors->has('precio_venta')) has-error @endif">
        {!! Form::label('precio_venta', 'Precio Venta:') !!}
        {!! Form::number('precio_venta', NULL, ['class' => 'form-control', 'step' => '0.01']) !!}
    </div>

    <!-- Precio Flete Field -->
    <div class="form-group col-sm-6 @if($errors->has('precio_flete')) has-error @endif">
        {!! Form::label('precio_flete', 'Precio Flete:') !!}
        {!! Form::number('precio_flete', NULL, ['class' => 'form-control', 'step' => '0.01']) !!}
    </div>

    <!-- Precio Despacho Field -->
    <div class="form-group col-sm-6 @if($errors->has('precio_despacho')) has-error @endif">
        {!! Form::label('precio_despacho', 'Precio Despacho:') !!}
        {!! Form::number('precio_despacho', NULL, ['class' => 'form-control', 'step' => '0.01']) !!}
    </div>

    <!-- Precio Costo Con Impuestos Field -->
    <div class="form-group col-sm-6 @if($errors->has('precio_costo_con_impuestos')) has-error @endif">
        {!! Form::label('precio_costo_con_impuestos', 'Precio Costo Con Impuestos:') !!}
        {!! Form::number('precio_costo_con_impuestos', NULL, ['class' => 'form-control', 'step' => '0.01']) !!}
    </div>

    <!-- Path Imagen Field -->
    <div class="form-group col-sm-6 @if($errors->has('path_imagen')) has-error @endif">
        {!! Form::label('path_imagen', 'Path Imagen:') !!}
        {!! Form::url('path_imagen', NULL, ['class' => 'form-control']) !!}
    </div>

    <!-- Imagen Field -->
    <div class="form-group col-sm-6 @if($errors->has('imagen')) has-error @endif">
        {!! Form::label('imagen', 'Imagen:') !!}
        {!! Form::file('imagen', ['class' => 'form-control']) !!}
    </div>

    <!-- Peso Field -->
    <div class="form-group col-sm-6 @if($errors->has('peso')) has-error @endif">
        {!! Form::label('peso', 'Peso:') !!}
        {!! Form::number('peso', NULL, ['class' => 'form-control', 'step' => '0.01']) !!}
    </div>
</div>

<div class="row">
    <!-- Activo Field -->
    <div class="form-group col-sm-6 @if($errors->has('activo')) has-error @endif">
        {!! Form::label('activo', 'Activo:') !!}
        <label class="checkbox-inline">
            {!! Form::hidden('activo', FALSE) !!}
            {!! Form::checkbox('activo', '1', NULL, ['class' => 'minimal']) !!}
        </label>
    </div>
</div>

<hr>

<div class="row">
    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
        <a href="{!! route('products.index') !!}" class="btn btn-default">Cancelar</a>
    </div>
</div>
