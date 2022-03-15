<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>@yield('page_title') | {{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="corepago, bitcoin, wallet, exchange, buy bitcoin, store bticoin" />
    <script
        type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="{{asset('css/style.css')}}" rel='stylesheet' type='text/css' />
    <!-- Graph CSS -->
    <link href="{{asset('css/lines.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">
    <!-- jQuery -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <!----webfonts--->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
    <!---//webfonts--->
    <!-- Nav CSS -->
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{asset('js/metisMenu.min.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
    <!-- Graph JavaScript -->
    <script src="{{asset('js/d3.v3.js')}}"></script>
    <script src="{{asset('js/rickshaw.js')}}"></script>
</head>

<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            {{-- topbar --}}
            @include('layouts.topbar')
            {{-- /topbar --}}
            {{-- sidebar --}}
                @include('layouts.sidebar')
            {{-- /sidebar --}}
            <!-- /.navbar-static-side -->
        </nav>
        <div id="page-wrapper">
            <div class="graphs">
                {{-- flash messages --}}
                @include('layouts.flash-errors')
                {{-- /flash messages --}}
                <!-- main content here -->
                @yield('content')
                <!-- /main content end -->
                <div class="copy">
                    <p>Copyright &copy; {{date('Y')}} Corepago. All Rights Reserved | Design by <a href="http://w3layouts.com/"
                            target="_blank">W3layouts</a> </p>
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>

</html>
