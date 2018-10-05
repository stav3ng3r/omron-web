@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Oficina Regional
        </h1>
    </section>
    <div class="content">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="box box-primary box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Datos de la Oficina Regional</h3>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        @include('regional_offices.show_fields')
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer text-center">
                        <a href="{!! route('regionalOffices.index') !!}" class="btn btn-default"><i
                                    class="fa fa-arrow-left"></i> Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
