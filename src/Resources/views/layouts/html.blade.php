<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Laravel User Management package</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf_token" content="{{ csrf_token() }}">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{URL::asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/font-awesome.css')}}">

    <script src="{{URL::asset('assets/js/libs/jquery-3.1.1.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/libs/jquery-ui.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/libs/angular.min.js')}}"></script>

    @yield('head')
</head>
<body class="">
@include('nav')
<section id="content" class="clearfix">
    @yield('content')
</section>
@include('footer')
<div class="ajax-modal"></div><!-- Place at bottom of page -->
</body>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{URL::asset('assets/js/libs/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('assets/js/libs/bootstrap-hover-dropdown.min.js')}}"></script>
<script src="{{URL::asset('assets/js/libs/bootbox.min.js')}}"></script>

<script>
    var API = {
        Data: {
            url: '<?= url('/'); ?>',
            action: '<?= isset($_GET['action']) ? $_GET['action'] : 0; ?>',
            token: "{{ csrf_token() }}"
        }
    };
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>


@yield('scripts_js')

</html>