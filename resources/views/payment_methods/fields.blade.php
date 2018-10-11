<!-- Descripcion Field -->
<div class="form-group col-sm-6 @if($errors->has('descripcion')) has-error @endif">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::text('descripcion', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Dias Field -->
<div class="form-group col-sm-6 @if($errors->has('dias')) has-error @endif">
    {!! Form::label('dias', 'Dias:') !!}
    {!! Form::number('dias', NULL, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('paymentMethods.index') !!}" class="btn btn-default">Cancelar</a>
</div>
