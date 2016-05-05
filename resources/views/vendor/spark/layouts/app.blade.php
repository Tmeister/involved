<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Information -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Spark ')</title>

    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css' rel='stylesheet'
          type='text/css'>

    <!-- CSS -->
    <link href="/css/sweetalert.css" rel="stylesheet">
    <link href="/css/pages-icons.css" rel="stylesheet">
    <link href="/js/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="/js/plugins/modernizr.custom.js" type="text/javascript"></script>
    @yield('scripts', '')

            <!-- Global Spark Object -->
    <script>
        window.Spark = <?php echo json_encode( array_merge(
                Spark::scriptVariables(), [ ]
        ) ); ?>
    </script>
</head>
<body class="with-navbar fixed-header horizontal-menu" v-cloak>
<nav class="page-sidebar" data-pages="sidebar">
    <!-- BEGIN SIDEBAR MENU HEADER-->
    <div class="sidebar-header">
        <img src="/img/mono-logo.png" alt="logo" class="brand" data-src="/img/mono-logo.png"
             data-src-retina="/img/mono-logo.png" width="100" height="32">
        <div class="sidebar-header-controls">
            <button type="button" class="btn btn-xs sidebar-slide-toggle btn-link m-l-20" data-pages-toggle="#appMenu">
                <i class="fa fa-angle-down fs-16"></i>
            </button>
            <button type="button" class="btn btn-link visible-lg-inline" data-toggle-pin="sidebar"><i
                        class="fa fs-12"></i>
            </button>
        </div>
    </div>
    <!-- END SIDEBAR MENU HEADER-->
    <!-- START SIDEBAR MENU -->
    <div class="sidebar-menu">
        <!-- BEGIN SIDEBAR MENU ITEMS-->
        <ul class="menu-items">
            <li class="m-t-30 ">
                <a href="/dashboard" class="detailed">
                    <span class="title">Dashboard</span>
                    <span class="details">12 New Updates</span>
                </a>
                <span class="bg-success icon-thumbnail"><i class="pg-home"></i></span>
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

    <div class="page-content-wrapper sm-gutter">
        <div class="content">
            <div class="container-fluid padding-25 sm-padding-10">
                <!-- Main Content -->
                @yield('content')
            </div>
        </div>

    </div>

            <!-- Application Level Modals -->
    @if (Auth::check())
    @include('spark::modals.notifications')
    @include('spark::modals.support')
    @include('spark::modals.session-expired')
    @endif

            <!-- JavaScript -->
    <script src="/js/app.js"></script>
    <script src="/js/sweetalert.min.js"></script>
    <script src="/js/plugins/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <script src="/js/pages.min.js"></script>
    <script src="/js/scripts.js" type="text/javascript"></script>
</div>
</body>
</html>
