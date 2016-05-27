<!DOCTYPE html>
<html lang="en" class="no-js css-menubar">
    <head>
        <!-- Meta Information -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', 'Spark')</title>

        <!-- Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic' rel='stylesheet'>
        <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css' rel='stylesheet'
              type='text/css'>

        <link href="/css/app.css" rel="stylesheet">

        <!-- Stylesheets -->
        <link rel="stylesheet" href="/theme/bootstrap.min.css">
        <link rel="stylesheet" href="/theme/bootstrap-extend.min.css">
        <link rel="stylesheet" href="/theme/site.min.css">
        <!-- Plugins -->
        <link rel="stylesheet" href="/theme/vendor/animsition/animsition.css">
        <link rel="stylesheet" href="/theme/vendor/asscrollable/asScrollable.css">
        <link rel="stylesheet" href="/theme/vendor/switchery/switchery.css">
        <link rel="stylesheet" href="/theme/vendor/intro-js/introjs.css">
        <link rel="stylesheet" href="/theme/vendor/slidepanel/slidePanel.css">
        <link rel="stylesheet" href="/theme/vendor/jquery-mmenu/jquery-mmenu.css">
        <link rel="stylesheet" href="/theme/vendor/flag-icon-css/flag-icon.css">
        <!-- Fonts -->
        <link rel="stylesheet" href="/theme/fonts/web-icons/web-icons.min.css">
        <link rel="stylesheet" href="/theme/fonts/brand-icons/brand-icons.min.css">
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
        <link rel='stylesheet' href='/css/app.css'>

        <!--[if lt IE 9]>
        <script src="/theme/vendor/html5shiv/html5shiv.min.js"></script>
        <![endif]-->
        <!--[if lt IE 10]>
        <script src="./theme/vendor/media-match/media.match.min.js"></script>
        <script src="/theme/vendor/respond/respond.min.js"></script>
        <![endif]-->
        <!-- Scripts -->
        <script src="/theme/vendor/modernizr/modernizr.js"></script>
        <script src="/theme/vendor/breakpoints/breakpoints.js"></script>
        <script>
            Breakpoints();
        </script>

        <!-- Scripts -->
        @yield('scripts', '')
        <!-- Global Spark Object -->
        <script>
            window.Spark = <?php echo json_encode( array_merge(
                    Spark::scriptVariables(), [ ]
            ) ); ?>
        </script>
    </head>

    <body class="site-navbar-small" v-cloak>
        @include('shared/navbar')
        @include('shared/menu')
        @yield('page')
        <footer class="site-footer">
            <div class="site-footer-right">
                Crafted with <i class="red-600 wb wb-heart"></i> by <a href="https://enriquechavez.co">Enrique Chavez</a>
            </div>
        </footer>
        <div id="spark-app"></div>

        <!-- Application Level Modals -->
        @if (Auth::check())
            @include('spark::modals.session-expired')
        @endif

        <!-- Core  -->
        <script src="/js/app.js"></script>
        <script src="/theme/vendor/jquery/jquery.js"></script>
        <script src="/theme/vendor/bootstrap/bootstrap.js"></script>
        <script src="/theme/vendor/animsition/animsition.js"></script>
        <script src="/theme/vendor/asscroll/jquery-asScroll.js"></script>
        <script src="/theme/vendor/mousewheel/jquery.mousewheel.js"></script>
        <script src="/theme/vendor/asscrollable/jquery.asScrollable.all.js"></script>
        <script src="/theme/vendor/ashoverscroll/jquery-asHoverScroll.js"></script>
        <!-- Plugins -->
        <script src="/theme/vendor/jquery-mmenu/jquery.mmenu.min.all.js"></script>
        <script src="/theme/vendor/switchery/switchery.min.js"></script>
        <script src="/theme/vendor/intro-js/intro.js"></script>
        <script src="/theme/vendor/screenfull/screenfull.js"></script>
        <script src="/theme/vendor/slidepanel/jquery-slidePanel.js"></script>
        <!-- Scripts -->
        <script src="/theme/js/core.js"></script>
        <script src="/theme//js/site.js"></script>
        <script src="/theme/js/sections/menu.js"></script>
        <script src="/theme/js/sections/menubar.js"></script>
        <script src="/theme/js/sections/gridmenu.js"></script>
        <script src="/theme/js/sections/sidebar.js"></script>
        <script src="/theme/js/configs/config-colors.js"></script>
        <script src="/theme/js/configs/config-tour.js"></script>
        <script src="/theme/js/components/asscrollable.js"></script>
        <script src="/theme/js/components/animsition.js"></script>
        <script src="/theme/js/components/slidepanel.js"></script>
        <script src="/theme/js/components/switchery.js"></script>

        <script>
            (function(document, window, $) {
                'use strict';
                var Site = window.Site;
                $(document).ready(function() {
                    Site.run();
                });
            })(document, window, jQuery);
        </script>
    </body>
</html>