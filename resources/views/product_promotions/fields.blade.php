<!-- Id Producto Field -->
<div class="form-group col-sm-6 @if($errors->has('id_producto')) has-error @endif">
    {!! Form::label('id_producto', 'Id Producto:') !!}
    {!! Form::select('id_producto', $products, old('id_producto', $productPromotion->id_producto), ['class' => 'form-control select2']) !!}
</div>

<!-- Desde Field -->
<div class="form-group col-sm-6 @if($errors->has('desde')) has-error @endif">
    {!! Form::label('desde', 'Desde:') !!}
    {!! Form::date('desde', old('desde', $productPromotion->desde->format('m/d/Y')), ['class' => 'form-control']) !!}
</div>

<!-- Hasta Field -->
<div class="form-group col-sm-6 @if($errors->has('hasta')) has-error @endif">
    {!! Form::label('hasta', 'Hasta:') !!}
    {!! Form::date('hasta', old('hasta', $productPromotion->hasta->format('m/d/Y')), ['class' => 'form-control']) !!}
</div>

<!-- Distribuidor Field -->
<div class="form-group col-sm-6 @if($errors->has('distribuidor')) has-error @endif">
    {!! Form::label('distribuidor', 'Distribuidor:') !!}
    {!! Form::select('distribuidor', $distributors, old('distribuidor', $productPromotion->distribuidor), ['class' => 'form-control select2']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('productPromotions.index') !!}" class="btn btn-default">Cancelar</a>
</div>


@section('scripts')
    <script>
        $(document).ready(function () {

            $('.select2').select2({
                placeholder: 'Selecciona un item',
                allowClear: true,
                theme: 'bootstrap',
                multiple: false
            });

        });
    </script>
@append