@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Monedas
        </h1>
    </section>
    <div class="content">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="box box-primary box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Datos de Moneda</h3>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            {!! Form::model($currency, ['route' => ['currencies.update', $currency->id], 'method' => 'patch']) !!}

                            @include('currencies.fields')

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection