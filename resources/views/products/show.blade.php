@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Productos
        </h1>
    </section>
    <div class="content">
        <div class="row">
            <div class="col-md-12 col-sm-12">

                <div class="box box-widget widget-user" data-vivaldi-spatnav-clickable="1">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-aqua-active">
                        <h3 class="widget-user-username">{{ $product->nombre }}</h3>
                        <h5 class="widget-user-desc">{{ $product->codigo }}</h5>
                    </div>
                    <div class="widget-user-image">
                        <img class="img-circle" src="{{ $product->path_imagen }}" style="width: 128px; height: 128px"
                             alt="{{ $product->codigo }}">
                    </div>

                    <div class="box-body" style="margin-top: 128px">
                        <div class="row">
                            <div class="col-sm-12">
                                @include('products.show_fields')
                            </div>
                        </div>
                    </div>

                    <div class="box-footer text-center">
                        <a href="{!! route('products.index') !!}" class="btn btn-default"><i
                                    class="fa fa-arrow-left"></i> Volver</a>
                    </div>

                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="box box-primary box-solid">

                    <div class="box-header with-border">
                        <h3 class="box-title">Detalles</h3>
                    </div>

                    <div class="box-body">
                        <div class="row margin-bottom">
                            <div class="col-md-12">
                                <a class="btn btn-success btn-flat pull-right"
                                   href="{!! route('productDetails.create', ['product' => $product->id]) !!}">
                                    <i class="glyphicon glyphicon-plus"></i> Agregar
                                </a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                @include('product_details.table')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="box box-primary box-solid">

                    <div class="box-header with-border">
                        <h3 class="box-title">Accesorios</h3>
                    </div>

                    <div class="box-body">
                        <div class="row margin-bottom">
                            <div class="col-md-12">
                                {!! Form::select('accessories_list', $productsList, NULL, ['id' => 'accessories_list']) !!}

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                @include('products.table_accessories')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {

            $('#accessories_list').select2({
                placeholder: 'Seleccionar Accesorios'
            });

        });
    </script>
@append
