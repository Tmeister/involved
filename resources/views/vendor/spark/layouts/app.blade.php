<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Information -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Spark 1')</title>

    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css' rel='stylesheet'
          type='text/css'>

    <!-- CSS -->
    <link href="/css/sweetalert.css" rel="stylesheet">
    <link href="/css/pages-icons.css" rel="stylesheet">
    <link href="/js/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://cdn.socket.io/socket.io-1.4.5.js"></script>
    <script src="/js/plugins/modernizr.custom.js"></script>
    @yield('scripts', '')

            <!-- Global Spark Object -->
    <script>
        window.Spark = <?php echo json_encode( array_merge(
                Spark::scriptVariables(), [ ]
        ) ); ?>
    </script>
</head>
<body class="fixed-header menu-behind" v-cloak>
<nav class="page-sidebar" data-pages="sidebar">
    <!-- BEGIN SIDEBAR MENU HEADER-->
    <div class="sidebar-header">
    </div>
    <!-- END SIDEBAR MENU HEADER-->
    <!-- START SIDEBAR MENU -->
    <div class="sidebar-menu" data-pages="sidebar">
        <!-- BEGIN SIDEBAR MENU ITEMS-->
        <ul class="menu-items">
            <li class="m-t-30 ">
                <a href="/home" class="detailed">
                    <span class="title">Dashboard</span>
                    <span class="details">12 New Updates</span>
                </a>
                <span class="icon-thumbnail"><i class="pg-home"></i></span>
            </li>
            <li>
                <a href="/people" class="detailed">
                    <span class="title">People</span>
                    <span class="details">12 New Updates</span>
                </a>
                <span class="icon-thumbnail"><i class="fa fa-user"></i></span>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <!-- END SIDEBAR MENU -->
</nav>
<div id="spark-app" class="page-container">
    <!-- Navigation -->
    <div class="header ">
        <div class="header-inner">
            @if (Auth::check())
                @include('spark::nav.user')
            @else
                @include('spark::nav.guest')
            @endif
        </div>
    </div>


    <!-- Main Content -->
    <div class="page-content-wrapper">
        <div class="content">
            @yield('content')
        </div>
    </div>

            <!-- Application Level Modals -->
    @if (Auth::check())
    @include('spark::modals.notifications')
    @include('spark::modals.support')
    @include('spark::modals.session-expired')
    @endif

            <!-- JavaScript -->
    <script src="/js/sweetalert.min.js"></script>
    <script src="/js/app.js"></script>
    <script src="/js/plugins/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <script src="/js/pages.min.js"></script>
</div>
</body>
</html>
