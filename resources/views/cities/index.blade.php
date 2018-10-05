@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Ciudad</h1>
        <h1 class="pull-right">
            <a class="btn btn-successy pull-right" style="margin-top: -10px;margin-bottom: 5px"
               href="{!! route('cities.create') !!}"><i class="fa fa-plus"></i> Agregar</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('cities.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection

