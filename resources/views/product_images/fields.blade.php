<!-- Id Producto Field -->
<div class="form-group col-sm-6 @if($errors->has('id_producto')) has-error @endif">
    {!! Form::label('id_producto', 'Id Producto:') !!}
    {!! Form::number('id_producto', null, ['class' => 'form-control']) !!}
</div>

<!-- Url Imagen Field -->
<div class="form-group col-sm-6 @if($errors->has('url_imagen')) has-error @endif">
    {!! Form::label('url_imagen', 'Url Imagen:') !!}
    {!! Form::text('url_imagen', null, ['class' => 'form-control']) !!}
</div>

<!-- Codigo Field -->
<div class="form-group col-sm-6 @if($errors->has('codigo')) has-error @endif">
    {!! Form::label('codigo', 'Codigo:') !!}
    {!! Form::text('codigo', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('productImages.index') !!}" class="btn btn-default">Cancelar</a>
</div>
