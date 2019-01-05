<!doctype html>
<html lang="fa">
<head>


    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Webmarket</title>

    <link rel="stylesheet" href="/css/font-awesome.min.css">

    <!--  Google Fonts  -->
    <link href='http://fonts.googleapis.com/css?family=Pacifico|Open+Sans:400,700,400italic,700italic&amp;subset=latin,latin-ext,greek'
          rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Twitter Bootstrap -->
    <link href="/stylesheets/bootstrap.css" rel="stylesheet">
    <link href="/stylesheets/responsive.css" rel="stylesheet">
    <!-- Slider Revolution -->
    <link rel="stylesheet" href="/js/rs-plugin/css/settings.css"
          type="text/css"/>
    <!-- jQuery UI -->
    <link rel="stylesheet"
          href="/js/jquery-ui-1.10.3/css/smoothness/jquery-ui-1.10.3.custom.min.css"
          type="text/css"/>
    <!-- PrettyPhoto -->
    <link rel="stylesheet" href="/js/prettyphoto/css/prettyPhoto.css"
          type="text/css"/>
    <!-- main styles -->

    <link href="/stylesheets/main.css" rel="stylesheet">


    <!-- Modernizr -->
    <script src="/js/modernizr.custom.56918.js"></script>

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
          href="/images/apple-touch/144.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
          href="/images/apple-touch/114.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
          href="/images/apple-touch/72.png">
    <link rel="apple-touch-icon-precomposed" href="/images/apple-touch/57.png">
    <link rel="shortcut icon" href="/images/apple-touch/57.png">




</head>
<body>
<div class="master-wrapper">
    @include('frontend.partials.header')
    @include('frontend.partials.navbar')
    <div class="boxed-area blocks-spacer">
        <div class="container">

            <!--  ==========  -->
            <!--  = Title =  -->
            <!--  ==========  -->
            <div class="row">
                <div class="span12">
                    <div class="main-titles lined">
                        <h2 class="title"><span
                                    class="light">{{ isset($pageTitle)? $pageTitle : 'محصولات جدید فروشگاه' }}</span>
                        </h2>
                    </div>
                </div>
            </div> <!-- /title -->

            <div class="row popup-products blocks-spacer">


                @yield('content')


            </div>
        </div>

    </div>

@include('frontend.partials.footer')


<!--  ==========  -->
    <!--  = Modal Windows =  -->
    <!--  ==========  -->
    <!--  = Login =  -->
    <div id="loginModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
         aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="loginModalLabel"><span class="light">ورود</span> در وبمارکت</h3>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ route('doLogin') }}">
                {{ csrf_field() }}
                <div class="control-group">
                    <label class="control-label hidden shown-ie8" for="inputEmail">ایمیل</label>
                    <div class="controls">
                        <input type="email" name="email" class="input-block-level" id="inputEmail" placeholder="ایمیل">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label hidden shown-ie8" for="inputPassword">رمز عبور</label>
                    <div class="controls">
                        <input type="password" name="password" class="input-block-level" id="inputPassword" placeholder="Password">
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <label class="checkbox">
                            <input name="remember" type="checkbox">
                            مرا به خاطر بسپار
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary input-block-level bold higher">
                    ورود
                </button>
            </form>
        </div>
    </div>

    <!--  = Register =  -->
    <div id="registerModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel"
         aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="registerModalLabel"><span class="light">ثبت نام</span> در وبمارکت</h3>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ route('register') }}">
                {{ csrf_field() }}
                <div class="control-group">
                    <label class="control-label hidden shown-ie8" for="inputnameRegister">نام</label>
                    <div class="controls">
                        <input type="text" name="first_name" class="input-block-level" id="inputnameRegister" placeholder="نام">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label hidden shown-ie8" for="inputFamilyNameRegister">نام خانوادگی</label>
                    <div class="controls">
                        <input type="text" name="last_name" class="input-block-level" id="inputFamilyNameRegister" placeholder="نام خانوادگی">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label hidden shown-ie8" for="inputEmailRegister">ایمیل</label>
                    <div class="controls">
                        <input type="email" name="email" class="input-block-level" id="inputEmailRegister" placeholder="Email">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label hidden shown-ie8" for="inputPasswordRegister">رمز عبور</label>
                    <div class="controls">
                        <input type="password" name="password" class="input-block-level" id="inputPasswordRegister"
                               placeholder="Password">
                    </div>
                </div>
                <button type="submit" class="btn btn-danger input-block-level bold higher">
                    ثبت نام
                </button>
            </form>
            <p class="center-align push-down-0">
                <a data-toggle="modal" role="button" href="#loginModal" data-dismiss="modal">قبلا ثبت نام کرده اید؟</a>
            </p>

        </div>
    </div>

</div>
<script src="/js/jquery.min.js" type="text/javascript"></script>
<!--  = _ =  -->
<script src="/js/underscore/underscore-min.js" type="text/javascript"></script>

<!--  = Bootstrap =  -->
<script src="/js/bootstrap.min.js" type="text/javascript"></script>



<!--  = Slider Revolution =  -->
<script src="/js/rs-plugin/pluginsources/jquery.themepunch.plugins.min.js" type="text/javascript"></script>
<script src="/js/rs-plugin/js/jquery.themepunch.revolution.min.js" type="text/javascript"></script>

<!--  = CarouFredSel =  -->
<script src="/js/jquery.carouFredSel-6.2.1-packed.js" type="text/javascript"></script>

<!--  = jQuery UI =  -->
<script src="/js/jquery-ui-1.10.3/js/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="/js/jquery-ui-1.10.3/touch-fix.min.js" type="text/javascript"></script>

<!--  = Isotope =  -->
<script src="/js/isotope/jquery.isotope.min.js" type="text/javascript"></script>

<!--  = Tour =  -->
<script src="/js/bootstrap-tour/build/js/bootstrap-tour.min.js" type="text/javascript"></script>

<!--  = PrettyPhoto =  -->
<script src="/js/prettyphoto/js/jquery.prettyPhoto.js" type="text/javascript"></script>

<!--  = Google Maps API =  -->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="/js/goMap/js/jquery.gomap-1.3.2.min.js"></script>

<!--  = Custom JS =  -->
<script src="/js/custom.js" type="text/javascript"></script>


<script src="/jss/sweetalert.min.js" type="text/javascript"></script>



<script src="/jss/frontend.js" type="text/javascript"></script>


</body>
</html>