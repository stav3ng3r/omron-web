<!-- Distribuidor Field -->
<div class="form-group col-sm-6 @if($errors->has('distribuidor')) has-error @endif">
    {!! Form::label('distribuidor', 'Distribuidor:') !!}
    {!! Form::number('distribuidor', null, ['class' => 'form-control']) !!}
</div>

<!-- Porcentaje Envio Field -->
<div class="form-group col-sm-6 @if($errors->has('porcentaje_envio')) has-error @endif">
    {!! Form::label('porcentaje_envio', 'Porcentaje Envio:') !!}
    {!! Form::number('porcentaje_envio', null, ['class' => 'form-control']) !!}
</div>

<!-- Porcentaje Aduana Field -->
<div class="form-group col-sm-6 @if($errors->has('porcentaje_aduana')) has-error @endif">
    {!! Form::label('porcentaje_aduana', 'Porcentaje Aduana:') !!}
    {!! Form::number('porcentaje_aduana', null, ['class' => 'form-control']) !!}
</div>

<!-- Porcentaje Utilidad Field -->
<div class="form-group col-sm-6 @if($errors->has('porcentaje_utilidad')) has-error @endif">
    {!! Form::label('porcentaje_utilidad', 'Porcentaje Utilidad:') !!}
    {!! Form::number('porcentaje_utilidad', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('distributorMarkups.index') !!}" class="btn btn-default">Cancelar</a>
</div>
