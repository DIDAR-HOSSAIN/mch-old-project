<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Welcome MCH</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{asset('backend-lib/dashboard/vendors/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend-lib/dashboard/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend-lib/dashboard/vendors/themify-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('backend-lib/dashboard/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend-lib/dashboard/vendors/selectFX/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{asset('backend-lib/dashboard/vendors/jqvmap/dist/jqvmap.min.css')}}">



    <link rel="stylesheet" href="{{asset('backend-lib/dashboard/assets/css/style.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
@yield('style')
</head>

<body>

@include('backend.elements.sidebar')


<!-- Right Panel -->

<div id="right-panel" class="right-panel">
    @include('backend.elements.header')

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">

        @yield('content')
        @yield('script')
        @yield('scripts')
        @yield('style')


    </div> <!-- .content -->
</div><!-- /#right-panel -->

<!-- Right Panel -->

<!-- Javascript -->
<script src="{{asset('Lib/js/jquery-min.js')}}"></script>
<script src="{{asset('Lib/js/libscripts.bundle.js')}}"></script>
<script src="{{asset('Lib/js/vendorscripts.bundle.js')}}"></script>
<script src="{{asset('Lib/js/flotscripts.bundle.js')}}"></script>
<script src="{{asset('Lib/js/c3.bundle.js')}}"></script>
<script src="{{asset('Lib/js/knob.bundle.js')}}"></script>
<script src="{{asset('Lib/js/mainscripts.bundle.js')}}"></script>
<script src="{{asset('Lib/js/index11.js')}}"></script>


<script src="{{asset('backend-lib/dashboard/vendors/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('backend-lib/dashboard/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{asset('backend-lib/dashboard/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('backend-lib/dashboard/assets/js/main.js')}}"></script>


<script src="{{asset('backend-lib/dashboard/vendors/chart.js/dist/Chart.bundle.min.js')}}"></script>
<script src="{{asset('backend-lib/dashboard/assets/js/dashboard.js')}}"></script>
<script src="{{asset('backend-lib/dashboard/assets/js/widgets.js')}}"></script>
<script src="{{asset('backend-lib/dashboard/vendors/jqvmap/dist/jquery.vmap.min.js')}}"></script>
<script src="{{asset('backend-lib/dashboard/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
<script src="{{asset('backend-lib/dashboard/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>


<script src="https://code.jquery.com/jquery-3.4.1.js"
integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
crossorigin="anonymous"></script>

<script src ="{{ asset('js/jquery-3.4.1.min.js') }}" ></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<script>
    (function($) {
        "use strict";

        jQuery('#vmap').vectorMap({
            map: 'world_en',
            backgroundColor: null,
            color: '#ffffff',
            hoverOpacity: 0.7,
            selectedColor: '#1de9b6',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: ['#1de9b6', '#03a9f5'],
            normalizeFunction: 'polynomial'
        });
    })(jQuery);
</script>


</body>

</html>
