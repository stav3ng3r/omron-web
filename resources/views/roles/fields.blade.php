<!-- Name Field -->
<div class="form-group col-sm-6 @if($errors->has('name')) has-error @endif">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Title Field -->
<div class="form-group col-sm-6 @if($errors->has('title')) has-error @endif">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Level Field -->
<div class="form-group col-sm-6 @if($errors->has('level')) has-error @endif">
    {!! Form::label('level', 'Level:') !!}
    {!! Form::number('level', null, ['class' => 'form-control']) !!}
</div>

<!-- Scope Field -->
<div class="form-group col-sm-6 @if($errors->has('scope')) has-error @endif">
    {!! Form::label('scope', 'Scope:') !!}
    {!! Form::number('scope', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('roles.index') !!}" class="btn btn-default">Cancelar</a>
</div>
