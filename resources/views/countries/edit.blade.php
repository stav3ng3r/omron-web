@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Pais
        </h1>
    </section>
    <div class="content">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="box box-primary box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Datos de Pais</h3>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            {!! Form::model($country, ['route' => ['countries.update', $country->id], 'method' => 'patch']) !!}

                            @include('countries.fields')

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection