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

<!-- Oficina Regional Field -->
<div class="form-group col-sm-6 @if($errors->has('oficina_regional')) has-error @endif">
    {!! Form::label('oficina_regional', 'Oficina Regional:') !!}
    {!! Form::select('oficina_regional', $regionalOffices, old('oficina_regional'), ['class' => 'form-control']) !!}
</div>

<!-- Marca Field -->
<div class="form-group col-sm-6 @if($errors->has('marca')) has-error @endif">
    {!! Form::label('marca', 'Marca:') !!}
    {!! Form::select('marca', $brands, old('marca'), ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('distributors.index') !!}" class="btn btn-default">Cancelar</a>
</div>
