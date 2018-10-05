<!-- Descripcion Field -->
<div class="form-group col-sm-6 @if($errors->has('descripcion')) has-error @endif">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::text('descripcion', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Numero Documento Field -->
<div class="form-group col-sm-6 @if($errors->has('numero_documento')) has-error @endif">
    {!! Form::label('numero_documento', 'Numero Documento:') !!}
    {!! Form::text('numero_documento', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Direccion Field -->
<div class="form-group col-sm-6 @if($errors->has('direccion')) has-error @endif">
    {!! Form::label('direccion', 'Direccion:') !!}
    {!! Form::text('direccion', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6 @if($errors->has('email')) has-error @endif">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Logo Field -->
<div class="form-group col-sm-6 @if($errors->has('logo')) has-error @endif">
    {!! Form::label('logo', 'Logo:') !!}
    {!! Form::text('logo', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Distribuidor Field -->
<div class="form-group col-sm-6 @if($errors->has('distribuidor')) has-error @endif">
    {!! Form::label('distribuidor', 'Distribuidor:') !!}
    {!! Form::select('distribuidor', $distributors, old('distributor'), ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('clients.index') !!}" class="btn btn-default">Cancelar</a>
</div>
