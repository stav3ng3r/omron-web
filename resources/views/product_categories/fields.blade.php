<!-- Id Marca Field -->
<div class="form-group col-sm-6 @if($errors->has('id_marca')) has-error @endif">
    {!! Form::label('id_marca', 'Id Marca:') !!}
    {!! Form::select('id_marca', $brands, old('id_marca'), ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-6 @if($errors->has('descripcion')) has-error @endif">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::text('descripcion', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success block-on-click']) !!}
    <a href="{!! route('productCategories.index') !!}" class="btn btn-default block-on-click">Cancelar</a>
</div>
