<!-- Descripcion Field -->
<div class="form-group col-sm-6 @if($errors->has('descripcion')) has-error @endif">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::text('descripcion', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Simbolo Field -->
<div class="form-group col-sm-6 @if($errors->has('simbolo')) has-error @endif">
    {!! Form::label('simbolo', 'Simbolo:') !!}
    {!! Form::text('simbolo', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success block-on-click']) !!}
    <a href="{!! route('currencies.index') !!}" class="btn btn-default block-on-click">Cancelar</a>
</div>
