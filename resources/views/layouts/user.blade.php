<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">



    <link href="/css/bootstrap.min.css" rel="stylesheet" >
    <link href="/css/bootstrap.rtl.full.min.css" rel="stylesheet" >
    <link href="/css/select2.min.css" rel="stylesheet" >
    {{--<link href="/larafiles/public/css/bootstrap-rtl.min.css" rel="stylesheet" >--}}

    {{--<link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet" >--}}

    <title>User Panel</title>
</head>
<body >

@include('frontend.user.partials.nav')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{ isset($panel_title)? $panel_title : '' }}</div>
                <div class="panel-body">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>




<script src="/jss/jquery.min.js"></script>
<script src="/jss/bootstrap.min.js"></script>
<script src="/jss/select2.min.js"></script>

</body>
</html>