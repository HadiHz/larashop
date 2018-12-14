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
<body class="checkout-page">
<div class="master-wrapper">



    <div class="container">
        <div class="row">

            <!--  ==========  -->
            <!--  = Main content =  -->
            <!--  ==========  -->
            <section class="span12">

                <div class="checkout-container">
                    <div class="row">
                        <div class="span10 offset1">

                            <!--  ==========  -->
                            <!--  = Header =  -->
                            <!--  ==========  -->
                            <header>
                                <div class="row">
                                    <div class="span2">
                                        <a href="{{ route('home') }}"><img src="/images/logo-bw.png" alt="Webmarket Logo" width="48" height="48" /></a>
                                    </div>
                                    <div class="span6">
                                        <div class="center-align">
                                            <h1><span class="light">{{ isset($pageTitle) ? $pageTitle : '' }}</span></h1>
                                        </div>
                                    </div>
                                    <div class="span2">
                                        <div class="right-align">
                                            <img src="/images/buttons/security.jpg" alt="Security Sign" width="92" height="65" />
                                        </div>
                                    </div>
                                </div>
                            </header>

                            <!--  ==========  -->
                            <!--  = Steps =  -->
                            <!--  ==========  -->
                            @yield('steps')
                             <!-- /steps -->



                            <!--  ==========  -->
                            <!--  = Selected Items =  -->
                            <!--  ==========  -->
                            @yield('content')

                            <hr />

                            @yield('link')

                        </div>
                    </div>
                </div>


            </section> <!-- /main content -->

        </div>
    </div> <!-- /container -->




</div> <!-- end of master-wrapper -->
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