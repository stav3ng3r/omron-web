@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1">Centros de Distribucion</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="row margin-bottom">
                            <div class="col-md-12">
                                <a class="btn btn-success btn-flat pull-right block-on-click"
                                   href="{!! route('distributionCenters.create') !!}">
                                    <i class="glyphicon glyphicon-plus"></i> Agregar
                                </a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                @include('distribution_centers.table')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

