<!-- Id Persona Field -->
<div class="form-group col-sm-6 @if($errors->has('id_persona')) has-error @endif">
    {!! Form::label('id_persona', 'Persona:') !!}
    {!! Form::select('id_persona', $people, NULL, ['class' => 'form-control']) !!}
</div>

<!-- Porcentaje Comision Field -->
<div class="form-group col-sm-6 @if($errors->has('porcentaje_comision')) has-error @endif">
    {!! Form::label('porcentaje_comision', 'Porcentaje Comision:') !!}
    {!! Form::number('porcentaje_comision', NULL, ['class' => 'form-control', 'step' => '0.01']) !!}
</div>

<!-- Meta Field -->
<div class="form-group col-sm-6 @if($errors->has('meta')) has-error @endif">
    {!! Form::label('meta', 'Meta:') !!}
    {!! Form::number('meta', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6 @if($errors->has('email')) has-error @endif">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Activo Field -->
<div class="form-group col-sm-6 @if($errors->has('activo')) has-error @endif">
    {!! Form::label('activo', 'Activo:') !!}
    <label class="checkbox-inline">
        {!! Form::checkbox('activo', '1', NULL, ['class' => 'form-control minimal']) !!}
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('salesmen.index') !!}" class="btn btn-default">Cancelar</a>
</div>
