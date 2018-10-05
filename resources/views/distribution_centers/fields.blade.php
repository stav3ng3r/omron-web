<!-- Titulo Field -->
<div class="form-group col-sm-6 @if($errors->has('titulo')) has-error @endif">
    {!! Form::label('titulo', 'Titulo:') !!}
    {!! Form::text('titulo', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-6 @if($errors->has('descripcion')) has-error @endif">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Pais Field -->
<div class="form-group col-sm-6 @if($errors->has('pais')) has-error @endif">
    {!! Form::label('pais', 'Pais:') !!}
    {!! Form::number('pais', null, ['class' => 'form-control']) !!}
</div>

<!-- Ciudad Field -->
<div class="form-group col-sm-6 @if($errors->has('ciudad')) has-error @endif">
    {!! Form::label('ciudad', 'Ciudad:') !!}
    {!! Form::number('ciudad', null, ['class' => 'form-control']) !!}
</div>

<!-- Telefono Field -->
<div class="form-group col-sm-6 @if($errors->has('telefono')) has-error @endif">
    {!! Form::label('telefono', 'Telefono:') !!}
    {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
</div>

<!-- Direccion Web Field -->
<div class="form-group col-sm-6 @if($errors->has('direccion_web')) has-error @endif">
    {!! Form::label('direccion_web', 'Direccion Web:') !!}
    {!! Form::text('direccion_web', null, ['class' => 'form-control']) !!}
</div>

<!-- Marca Field -->
<div class="form-group col-sm-6 @if($errors->has('marca')) has-error @endif">
    {!! Form::label('marca', 'Marca:') !!}
    {!! Form::number('marca', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('distributionCenters.index') !!}" class="btn btn-default">Cancelar</a>
</div>
