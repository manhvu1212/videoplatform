<!DOCTYPE html>
<!-- saved from url=(0022)http://gg.novario.net/ -->
<html lang="en">
<script type="text/javascript">window["_gaUserPrefs"] = {
        ioo: function () {
            return true;
        }
    }</script>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Videoplatform novario</title>
    <link rel="shortcut icon" href="/assets/frontend/images/favico.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" id="dashicons-css" href="/assets/frontend/css/dashicons.min.css" type="text/css" media="all">


    <link rel="stylesheet" id="themename-cssss"
          href="https://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css" type="text/css"
          media="all">
    <link rel="stylesheet" id="themename-css" href="/assets/frontend/css/lightSlider.css" type="text/css" media="all">
    <link rel="stylesheet" id="themename-css" href="/assets/frontend/css/bootstrap.css" type="text/css" media="all">
    <link rel="stylesheet" id="themename-css" href="/assets/frontend/css/flexslider.css" type="text/css" media="all">
    <link rel="stylesheet" id="themename-css" href="/assets/frontend/css/skin.css" type="text/css" media="all">
    <link rel="stylesheet" id="themename-css" href="/assets/frontend/css/prettyph.css" type="text/css" media="all">
    <link href="/fontend/css/alert.css" rel="stylesheet">

    <link rel="stylesheet" id="themename-css" href="/assets/frontend/css/style.css" type="text/css" media="all">
    <link rel="stylesheet" id="themename-css" href="/assets/frontend/css/color.css" type="text/css" media="all">
    <link rel="stylesheet" id="themename-css" href="/assets/frontend/css/bootstrap-responsive.css" type="text/css"
          media="all">
    @yield('style')
</head>
<body>
<div class="wrapper gallery_video" id="home">
    @include('layouts.frontend.header')
    @yield('content')
            <!--Footer-->
    @include('layouts.frontend.footer')
</div>
<script type="text/javascript" src="/assets/frontend/js/jquery.min.js"></script>
<script type="text/javascript" src="/assets/frontend/misc/bootstrap/bootstrap.min.js"></script>
<script defer src="/fontend/js/jquery.flexslider.js"></script>
<script defer src="/fontend/js/jquery.jcarousel.min.js"></script>
<script defer src="/fontend/js/jquery.jscrollpane.min.js"></script>
<script defer src="/fontend/js/jquery.scrollTo-min.js"></script>
<script type="text/javascript" src="/fontend/js/functions.js"></script>
<script type="text/javascript" src="/fontend/js/prettyph.js"></script>
<script type="text/javascript" src="/fontend/js/jquery.lightSlider.min.js"></script>
<script type="text/javascript" src="/fontend/js/home.js"></script>
<script type="text/javascript" src="/fontend/js/videoplatform.js"></script>
<script src="https://www.youtube.com/iframe_api"></script>
<script src="/fontend/js/login.js"></script>
<script src="/assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
@yield('script')
</body>
</html>