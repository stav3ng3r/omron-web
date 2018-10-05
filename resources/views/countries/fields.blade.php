<!-- Descripcion Field -->
<div class="form-group col-sm-6 @if($errors->has('descripcion')) has-error @endif">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Abreviatura Field -->
<div class="form-group col-sm-6 @if($errors->has('abreviatura')) has-error @endif">
    {!! Form::label('abreviatura', 'Abreviatura:') !!}
    {!! Form::text('abreviatura', null, ['class' => 'form-control']) !!}
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

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('countries.index') !!}" class="btn btn-default">Cancelar</a>
</div>
