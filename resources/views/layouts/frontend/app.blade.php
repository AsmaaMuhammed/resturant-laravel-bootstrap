<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Asma Restaurant') }}</title>

    <!-- Styles -->
    <link href="{{asset('frontend/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all"/>
    <!-- Custom Theme files -->
    <!--theme-style-->
    <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet" type="text/css" media="all"/>
    <!--//theme-style-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Cookery Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"/>

    <link href='//fonts.googleapis.com/css?family=Raleway:400,200,100,300,500,600,700,800,900' rel='stylesheet'
          type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700' rel='stylesheet'
          type='text/css'>

    <!-- start-smoth-scrolling -->
    <link href="{{asset('frontend/css/styles.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/component.css')}}"/>
    <!-- animation-effect -->
    <link href="{{asset('frontend/css/animate.min.css')}}" rel="stylesheet">
    <!-- share btn style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>

<!--header-->
@if($route === 'menu' || $route ==='contacts' || $route ==='comments' || $route ==='events' || $route ==='blog' || $route==='search-for-dishes')
    @include('layouts.frontend.header2')
@else
    @include('layouts.frontend.header')
@endif
<!---->
@yield('content')
<!--footer-->
@include('layouts.frontend.footer')
<!---->

<!-- Scripts -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{asset('frontend/js/jquery.min.js')}}"></script>
<!-- -->
<script>
    $('.navicon').on('click', function (e) {
        e.preventDefault();
        $(this).toggleClass('navicon--active');
        $('.toggle').toggleClass('toggle--active');
    });
</script>
<!--//theme-style-->
<script type="application/x-javascript"> addEventListener("load", function () {
        setTimeout(hideURLbar, 0);
    }, false);
    function hideURLbar() {
        window.scrollTo(0, 1);
    } </script>
<!---->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="{{asset('frontend/js/move-top.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/easing.js')}}"></script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
            event.preventDefault();
            $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
        });
    });
</script>
<!-- animation-effect -->
<script src="{{asset('frontend/js/wow.min.js')}}"></script>
<script>
    new WOW().init();
</script>
<!-- //animation-effect -->

@yield('scripts')
</body>
</html>