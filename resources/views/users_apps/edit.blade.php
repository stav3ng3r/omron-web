@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Users App
        </h1>
   </section>
   <div class="content">
       <div class="row">
           <div class="col-md-6 col-sm-12">
               <div class="box box-primary box-solid">
                   <div class="box-header with-border">
                       <h3 class="box-title">Datos del Usuario</h3>
                   </div>

                   <div class="box-body">
                       <div class="row">
                           {!! Form::model($usersApp, ['route' => ['usersApps.update', $usersApp->id], 'method' => 'patch']) !!}

                               @include('users_apps.fields')

                          {!! Form::close() !!}
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
@endsection