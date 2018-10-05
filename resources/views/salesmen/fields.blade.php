<!-- Id Persona Field -->
<div class="form-group col-sm-6 @if($errors->has('id_persona')) has-error @endif">
    {!! Form::label('id_persona', 'Id Persona:') !!}
    {!! Form::number('id_persona', null, ['class' => 'form-control']) !!}
</div>

<!-- Activo Field -->
<div class="form-group col-sm-6 @if($errors->has('activo')) has-error @endif">
    {!! Form::label('activo', 'Activo:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('activo', false) !!}
        {!! Form::checkbox('activo', '1', null) !!} 1
    </label>
</div>

<!-- Porcentaje Comision Field -->
<div class="form-group col-sm-6 @if($errors->has('porcentaje_comision')) has-error @endif">
    {!! Form::label('porcentaje_comision', 'Porcentaje Comision:') !!}
    {!! Form::number('porcentaje_comision', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Creacion Field -->
<div class="form-group col-sm-6 @if($errors->has('fecha_creacion')) has-error @endif">
    {!! Form::label('fecha_creacion', 'Fecha Creacion:') !!}
    {!! Form::date('fecha_creacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Meta Field -->
<div class="form-group col-sm-6 @if($errors->has('meta')) has-error @endif">
    {!! Form::label('meta', 'Meta:') !!}
    {!! Form::number('meta', null, ['class' => 'form-control']) !!}
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

<!-- Email Field -->
<div class="form-group col-sm-6 @if($errors->has('email')) has-error @endif">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('salesmen.index') !!}" class="btn btn-default">Cancelar</a>
</div>
