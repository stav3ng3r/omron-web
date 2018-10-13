<!-- Titulo Field -->
<div class="form-group col-sm-6 @if($errors->has('titulo')) has-error @endif">
    {!! Form::label('titulo', 'Titulo:') !!}
    {!! Form::text('titulo', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-6 @if($errors->has('descripcion')) has-error @endif">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::text('descripcion', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Pais Field -->
<div class="form-group col-sm-6 @if($errors->has('pais')) has-error @endif">
    {!! Form::label('pais', 'Pais:') !!}
    {!! Form::select('pais', $countries, old('pais'), ['class' => 'form-control']) !!}
</div>

<!-- Ciudad Field -->
<div class="form-group col-sm-6 @if($errors->has('ciudad')) has-error @endif">
    {!! Form::label('ciudad', 'Ciudad:') !!}
    {!! Form::select('ciudad', $cities, old('ciudad'), ['class' => 'form-control']) !!}
</div>

<!-- Direccion Field -->
<div class="form-group col-sm-6 @if($errors->has('direccion')) has-error @endif">
    {!! Form::label('direccion', 'Direccion:') !!}
    {!! Form::text('direccion', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Telefono Field -->
<div class="form-group col-sm-6 @if($errors->has('telefono')) has-error @endif">
    {!! Form::label('telefono', 'Telefono:') !!}
    {!! Form::text('telefono', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Centro Distribucion Field -->
<div class="form-group col-sm-6 @if($errors->has('centro_distribucion')) has-error @endif">
    {!! Form::label('centro_distribucion', 'Centro Distribucion:') !!}
    {!! Form::select('centro_distribucion', $distributionCenters, old('centro_distribucion'), ['class' => 'form-control']) !!}
</div>

<!-- Marca Field -->
<div class="form-group col-sm-6 @if($errors->has('marca')) has-error @endif">
    {!! Form::label('marca', 'Marca:') !!}
    {!! Form::select('marca', $brands, old('marca'), ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success block-on-click']) !!}
    <a href="{!! route('regionalOffices.index') !!}" class="btn btn-default block-on-click">Cancelar</a>
</div>
