<!DOCTYPE html>

<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="ThemeStarz">

    <link href="{{url('')}}/assets/fonts/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="{{url('')}}/assets/fonts/elegant-fonts.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{url('')}}/assets/bootstrap/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="{{url('')}}/assets/css/zabuto_calendar.min.css" type="text/css">
    <link rel="stylesheet" href="{{url('')}}/assets/css/bootstrap-select.min.css" type="text/css">
    <link rel="stylesheet" href="{{url('')}}/assets/revolution/css/settings.css" type="text/css">
    <link rel="stylesheet" href="{{url('')}}/assets/revolution/css/layers.css" type="text/css">
    <link rel="stylesheet" href="{{url('')}}/assets/revolution/css/navigation.css" type="text/css">
    <link rel="stylesheet" href="{{url('')}}/assets/css/style.css" type="text/css">
    @stack('customCSS')

    <title>ExamCloud | @yield('title') </title>

</head>

<body class="homepage">
<div class="overlay"></div>

<div class="outer-wrapper">
<div class="page-wrapper">

    <header class="navigation" id="top">
        <div class="container">
        
            <!--/.secondary-nav-->
            <div class="main-nav">
                <div class="brand"><a href="{{url('')}}"><img src="{{url('')}}/assets/logo.png" alt=""></a></div><!--/.brand-->
  @include("frontend.partials.navbar")

            </div>
            <!--/.main-nav-->
        </div>
        <!--/.container-->
    </header>
    <!--/.header-->

                        @include('frontend.partials.messages')
                        @yield('content')
            
 
 
  <!-- /.subfooter --> 
</div>
<!--/.box--> 

<script type="text/javascript" src="{{url('')}}/assets/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="{{url('')}}/assets/js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="{{url('')}}/assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{url('')}}/assets/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="{{url('')}}/assets/js/zabuto_calendar.min.js"></script>
<script type="text/javascript" src="{{url('')}}/assets/js/jquery.validate.min.js"></script>

<script type="text/javascript" src="{{url('')}}/assets/revolution/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="{{url('')}}/assets/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="{{url('')}}/assets/revolution/js/extensions/revolution.extension.video.min.js"></script>
<script type="text/javascript" src="{{url('')}}/assets/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="{{url('')}}/assets/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script type="text/javascript" src="{{url('')}}/assets/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="{{url('')}}/assets/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script type="text/javascript" src="{{url('')}}/assets/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="{{url('')}}/assets/revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script type="text/javascript" src="{{url('')}}/assets/revolution/js/extensions/revolution.extension.parallax.min.js"></script>

<script type="text/javascript" src="{{url('')}}/assets/js/custom.js"></script>
    <script src="{{url('')}}/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
<!--[if lte IE 9]>
    <script src="{{url('')}}/assets/js/ie.js"></script>
<![endif]-->
@stack('customJS')
<script type="text/javascript">
    

$(document).ready(function(){

    $("#slider").show();
})
</script>

</body>