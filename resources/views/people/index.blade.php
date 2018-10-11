@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>Personas</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="row margin-bottom">
                            <div class="col-md-12">
                                <a class="btn btn-success btn-flat pull-right"
                                   href="{!! route('people.create') !!}">
                                    <i class="glyphicon glyphicon-plus"></i> Agregar
                                </a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                @include('people.table')
                            </div>
                        </div>
                        <div class="row">
                            @include('adminlte-templates::common.paginate', ['records' => $people])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

