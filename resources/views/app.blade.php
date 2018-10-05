<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>OMRON | Dashboard</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    @include('partials._css')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- PAGE CSS -->
    @yield('page_css')

</head>
{{--<!----}}
{{--BODY TAG OPTIONS:--}}
{{--=================--}}
{{--Apply one or more of the following classes to get the--}}
{{--desired effect--}}
{{--|---------------------------------------------------------|--}}
{{--| SKINS         | skin-blue                               |--}}
{{--|               | skin-black                              |--}}
{{--|               | skin-purple                             |--}}
{{--|               | skin-yellow                             |--}}
{{--|               | skin-red                                |--}}
{{--|               | skin-green                              |--}}
{{--|---------------------------------------------------------|--}}
{{--|LAYOUT OPTIONS | fixed                                   |--}}
{{--|               | layout-boxed                            |--}}
{{--|               | layout-top-nav                          |--}}
{{--|               | sidebar-collapse                        |--}}
{{--|               | sidebar-mini                            |--}}
{{--|---------------------------------------------------------|--}}
{{---->--}}
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">


    <!-- Main Header -->
    @include('partials._header')

    <!-- Left side column. contains the logo and sidebar -->
{{--    @include('partials._sidebar')--}}

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

            <h1>
                @yield('page_title')
                <small>@yield('page_description')</small>
            </h1>

            @yield('breadcrumb')
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            @yield('content')

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    @include('partials._footer')

    <!-- Control Sidebar -->
    @include('partials._controlbar')
    <!-- /.control-sidebar -->

</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->
@include('partials._js')

<!-- PAGE JS SCRIPTS -->
@yield('page_js')

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>