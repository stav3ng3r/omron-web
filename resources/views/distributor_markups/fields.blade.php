<!-- Distribuidor Field -->
<div class="form-group col-sm-6 @if($errors->has('distribuidor')) has-error @endif">
    {!! Form::label('distribuidor', 'Distribuidor:') !!}
    {!! Form::select('distribuidor', $distributors, old('distributor'), ['class' => 'form-control']) !!}
</div>

<!-- Porcentaje Envio Field -->
<div class="form-group col-sm-6 @if($errors->has('porcentaje_envio')) has-error @endif">
    {!! Form::label('porcentaje_envio', 'Porcentaje Envio:') !!}
    {!! Form::number('porcentaje_envio', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Porcentaje Aduana Field -->
<div class="form-group col-sm-6 @if($errors->has('porcentaje_aduana')) has-error @endif">
    {!! Form::label('porcentaje_aduana', 'Porcentaje Aduana:') !!}
    {!! Form::number('porcentaje_aduana', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Porcentaje Utilidad Field -->
<div class="form-group col-sm-6 @if($errors->has('porcentaje_utilidad')) has-error @endif">
    {!! Form::label('porcentaje_utilidad', 'Porcentaje Utilidad:') !!}
    {!! Form::number('porcentaje_utilidad', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success block-on-click']) !!}
    <a href="{!! route('distributorMarkups.index') !!}" class="btn btn-default block-on-click">Cancelar</a>
</div>
