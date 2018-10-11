@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Promociones
        </h1>
    </section>
    <div class="content">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="box box-primary box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Datos de la Promocion</h3>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            {!! Form::model($productPromotion, ['route' => ['productPromotions.update', $productPromotion->id], 'method' => 'patch']) !!}

                            @include('product_promotions.fields')

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection