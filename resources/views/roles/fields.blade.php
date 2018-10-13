<!-- Name Field -->
<div class="form-group col-sm-6 @if($errors->has('name')) has-error @endif">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Title Field -->
<div class="form-group col-sm-6 @if($errors->has('title')) has-error @endif">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', NULL, ['class' => 'form-control']) !!}
</div>

{{--<!-- Level Field -->--}}
{{--<div class="form-group col-sm-6 @if($errors->has('level')) has-error @endif">--}}
{{--{!! Form::label('level', 'Level:') !!}--}}
{{--{!! Form::number('level', NULL, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

{{--<!-- Scope Field -->--}}
{{--<div class="form-group col-sm-6 @if($errors->has('scope')) has-error @endif">--}}
{{--{!! Form::label('scope', 'Scope:') !!}--}}
{{--{!! Form::number('scope', NULL, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success block-on-click']) !!}
    <a href="{!! route('roles.index') !!}" class="btn btn-default block-on-click">Cancelar</a>
</div>
