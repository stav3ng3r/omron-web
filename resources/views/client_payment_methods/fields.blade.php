<!-- Distribuidor Field -->
<div class="form-group col-sm-6 @if($errors->has('distribuidor')) has-error @endif">
    {!! Form::label('distribuidor', 'Distribuidor:') !!}
    {!! Form::number('distribuidor', null, ['class' => 'form-control']) !!}
</div>

<!-- Cliente Field -->
<div class="form-group col-sm-6 @if($errors->has('cliente')) has-error @endif">
    {!! Form::label('cliente', 'Cliente:') !!}
    {!! Form::number('cliente', null, ['class' => 'form-control']) !!}
</div>

<!-- Forma De Pago Field -->
<div class="form-group col-sm-6 @if($errors->has('forma_de_pago')) has-error @endif">
    {!! Form::label('forma_de_pago', 'Forma De Pago:') !!}
    {!! Form::number('forma_de_pago', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('clientPaymentMethods.index') !!}" class="btn btn-default">Cancelar</a>
</div>
