<!-- Id Categoria Field -->
<div class="form-group col-sm-6 @if($errors->has('id_categoria')) has-error @endif">
    {!! Form::label('id_categoria', 'Id Categoria:') !!}
    {!! Form::select('id_categoria', $categories, NULL, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-6 @if($errors->has('descripcion')) has-error @endif">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::text('descripcion', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success block-on-click']) !!}
    <a href="{!! route('productTypes.index') !!}" class="btn btn-default block-on-click">Cancelar</a>
</div>
