<spark-navbar
        :user="user"
        :teams="teams"
        :current-team="currentTeam"
        :has-unread-notifications="hasUnreadNotifications"
        :has-unread-announcements="hasUnreadAnnouncements"
        inline-template>
    <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle hamburger hamburger-close navbar-toggle-left hided"
                data-toggle="menubar">
            <span class="sr-only">Toggle navigation</span>
            <span class="hamburger-bar"></span>
        </button>
        <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-collapse"
                data-toggle="collapse">
            <i class="icon wb-more-horizontal" aria-hidden="true"></i>
        </button>
        <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
            <img class="navbar-brand-logo" src="../assets/images/logo.png" title="Involved">
            <span class="navbar-brand-text hidden-xs"> Involved</span>
        </div>
    </div>
    <div class="navbar-container container-fluid">
        <!-- Navbar Collapse -->
        <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
            <!-- Navbar Toolbar -->
            <ul class="nav navbar-toolbar">
                <li class="hidden-float" id="toggleMenubar">
                    <a data-toggle="menubar" href="#" role="button">
                        <i class="icon hamburger hamburger-arrow-left">
                            <span class="sr-only">Toggle menubar</span>
                            <span class="hamburger-bar"></span>
                        </i>
                    </a>
                </li>
            </ul>
            <!-- End Navbar Toolbar -->
            <!-- Navbar Toolbar Right -->
            <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
                <li class="dropdown">
                    <a class="navbar-avatar dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"
                       data-animation="scale-up" role="button">
                <span class="avatar avatar-online">
                <img :src="user.photo_url">
                <i></i>
              </span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <!-- Impersonation -->
                        @if (session('spark:impersonator'))
                            <li class="dropdown-header">Impersonation</li>

                            <!-- Stop Impersonating -->
                            <li>
                                <a href="/spark/kiosk/users/stop-impersonating">
                                    <i class="fa fa-fw fa-btn fa-user-secret"></i>Back To My Account
                                </a>
                            </li>

                            <li class="divider"></li>
                        @endif

                    <!-- Developer -->
                        @if (Spark::developer(Auth::user()->email))
                            @include('spark::nav.developer')
                        @endif

                    <!-- Subscription Reminders -->
                        @include('spark::nav.subscriptions')

                    <!-- Settings -->
                        <li class="dropdown-header">Settings</li>

                        <!-- Your Settings -->
                        <li>
                            <a href="/settings">
                                <i class="fa fa-fw fa-btn fa-cog"></i>Your Settings
                            </a>
                        </li>

                        @if (Spark::usesTeams())
                        <!-- Team Settings -->
                            @include('spark::nav.teams')
                        @endif

                        <li class="divider"></li>

                        <!-- Support -->
                        <li class="dropdown-header">Support</li>

                        <li>
                            <a @click.prevent="showSupportForm" style="cursor: pointer;">
                                <i class="fa fa-fw fa-btn fa-paper-plane"></i>Email Us
                            </a>
                        </li>

                        <li class="divider"></li>

                        <!-- Logout -->
                        <li>
                            <a href="/logout">
                                <i class="fa fa-fw fa-btn fa-sign-out"></i>Logout
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a data-toggle="dropdown" href="javascript:void(0)" title="Notifications" aria-expanded="false"
                       data-animation="scale-up" role="button">
                        <i class="icon wb-bell" aria-hidden="true"></i>
                        <span class="badge badge-danger up">5</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
                        <li class="dropdown-menu-header" role="presentation">
                            <h5>NOTIFICATIONS</h5>
                            <span class="label label-round label-danger">New 5</span>
                        </li>
                        <li class="list-group" role="presentation">
                            <div data-role="container">
                                <div data-role="content">
                                    <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                        <div class="media">
                                            <div class="media-left padding-right-10">
                                                <i class="icon wb-order bg-red-600 white icon-circle" aria-hidden="true"></i>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading">A new order has been placed</h6>
                                                <time class="media-meta" datetime="2016-06-12T20:50:48+08:00">5 hours ago</time>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                        <div class="media">
                                            <div class="media-left padding-right-10">
                                                <i class="icon wb-user bg-green-600 white icon-circle" aria-hidden="true"></i>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading">Completed the task</h6>
                                                <time class="media-meta" datetime="2016-06-11T18:29:20+08:00">2 days ago</time>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                        <div class="media">
                                            <div class="media-left padding-right-10">
                                                <i class="icon wb-settings bg-red-600 white icon-circle" aria-hidden="true"></i>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading">Settings updated</h6>
                                                <time class="media-meta" datetime="2016-06-11T14:05:00+08:00">2 days ago</time>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                        <div class="media">
                                            <div class="media-left padding-right-10">
                                                <i class="icon wb-calendar bg-blue-600 white icon-circle" aria-hidden="true"></i>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading">Event started</h6>
                                                <time class="media-meta" datetime="2016-06-10T13:50:18+08:00">3 days ago</time>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                        <div class="media">
                                            <div class="media-left padding-right-10">
                                                <i class="icon wb-chat bg-orange-600 white icon-circle" aria-hidden="true"></i>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading">Message received</h6>
                                                <time class="media-meta" datetime="2016-06-10T12:34:48+08:00">3 days ago</time>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-menu-footer" role="presentation">
                            <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
                                <i class="icon wb-settings" aria-hidden="true"></i>
                            </a>
                            <a href="javascript:void(0)" role="menuitem">
                                All notifications
                            </a>
                        </li>
                    </ul>
                </li>
                {{--<li class="dropdown">--}}
                    {{--<a data-toggle="dropdown" href="javascript:void(0)" title="Messages" aria-expanded="false"--}}
                       {{--data-animation="scale-up" role="button">--}}
                        {{--<i class="icon wb-envelope" aria-hidden="true"></i>--}}
                        {{--<span class="badge badge-info up">3</span>--}}
                    {{--</a>--}}
                    {{--<ul class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">--}}
                        {{--<li class="dropdown-menu-header" role="presentation">--}}
                            {{--<h5>MESSAGES</h5>--}}
                            {{--<span class="label label-round label-info">New 3</span>--}}
                        {{--</li>--}}
                        {{--<li class="list-group" role="presentation">--}}
                            {{--<div data-role="container">--}}
                                {{--<div data-role="content">--}}
                                    {{--<a class="list-group-item" href="javascript:void(0)" role="menuitem">--}}
                                        {{--<div class="media">--}}
                                            {{--<div class="media-left padding-right-10">--}}
                          {{--<span class="avatar avatar-sm avatar-online">--}}
                            {{--<img src="../../global/portraits/2.jpg" alt="..." />--}}
                            {{--<i></i>--}}
                          {{--</span>--}}
                                            {{--</div>--}}
                                            {{--<div class="media-body">--}}
                                                {{--<h6 class="media-heading">Mary Adams</h6>--}}
                                                {{--<div class="media-meta">--}}
                                                    {{--<time datetime="2016-06-17T20:22:05+08:00">30 minutes ago</time>--}}
                                                {{--</div>--}}
                                                {{--<div class="media-detail">Anyways, i would like just do it</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                    {{--<a class="list-group-item" href="javascript:void(0)" role="menuitem">--}}
                                        {{--<div class="media">--}}
                                            {{--<div class="media-left padding-right-10">--}}
                          {{--<span class="avatar avatar-sm avatar-off">--}}
                            {{--<img src="../../global/portraits/3.jpg" alt="..." />--}}
                            {{--<i></i>--}}
                          {{--</span>--}}
                                            {{--</div>--}}
                                            {{--<div class="media-body">--}}
                                                {{--<h6 class="media-heading">Caleb Richards</h6>--}}
                                                {{--<div class="media-meta">--}}
                                                    {{--<time datetime="2016-06-17T12:30:30+08:00">12 hours ago</time>--}}
                                                {{--</div>--}}
                                                {{--<div class="media-detail">I checheck the document. But there seems</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                    {{--<a class="list-group-item" href="javascript:void(0)" role="menuitem">--}}
                                        {{--<div class="media">--}}
                                            {{--<div class="media-left padding-right-10">--}}
                          {{--<span class="avatar avatar-sm avatar-busy">--}}
                            {{--<img src="../../global/portraits/4.jpg" alt="..." />--}}
                            {{--<i></i>--}}
                          {{--</span>--}}
                                            {{--</div>--}}
                                            {{--<div class="media-body">--}}
                                                {{--<h6 class="media-heading">June Lane</h6>--}}
                                                {{--<div class="media-meta">--}}
                                                    {{--<time datetime="2016-06-16T18:38:40+08:00">2 days ago</time>--}}
                                                {{--</div>--}}
                                                {{--<div class="media-detail">Lorem ipsum Id consectetur et minim</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                    {{--<a class="list-group-item" href="javascript:void(0)" role="menuitem">--}}
                                        {{--<div class="media">--}}
                                            {{--<div class="media-left padding-right-10">--}}
                          {{--<span class="avatar avatar-sm avatar-away">--}}
                            {{--<img src="../../global/portraits/5.jpg" alt="..." />--}}
                            {{--<i></i>--}}
                          {{--</span>--}}
                                            {{--</div>--}}
                                            {{--<div class="media-body">--}}
                                                {{--<h6 class="media-heading">Edward Fletcher</h6>--}}
                                                {{--<div class="media-meta">--}}
                                                    {{--<time datetime="2016-06-15T20:34:48+08:00">3 days ago</time>--}}
                                                {{--</div>--}}
                                                {{--<div class="media-detail">Dolor et irure cupidatat commodo nostrud nostrud.</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                        {{--<li class="dropdown-menu-footer" role="presentation">--}}
                            {{--<a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">--}}
                                {{--<i class="icon wb-settings" aria-hidden="true"></i>--}}
                            {{--</a>--}}
                            {{--<a href="javascript:void(0)" role="menuitem">--}}
                                {{--See all messages--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<li id="toggleChat">--}}
                    {{--<a data-toggle="site-sidebar" href="javascript:void(0)" title="Chat" data-url="site-sidebar.tpl">--}}
                        {{--<i class="icon wb-chat" aria-hidden="true"></i>--}}
                    {{--</a>--}}
                {{--</li>--}}
            </ul>
            <!-- End Navbar Toolbar Right -->
        </div>
        <!-- End Navbar Collapse -->
        <!-- Site Navbar Seach -->
        <div class="collapse navbar-search-overlap" id="site-navbar-search">
            <form role="search">
                <div class="form-group">
                    <div class="input-search">
                        <i class="input-search-icon wb-search" aria-hidden="true"></i>
                        <input type="text" class="form-control" name="site-search" placeholder="Search...">
                        <button type="button" class="input-search-close icon wb-close" data-target="#site-navbar-search"
                                data-toggle="collapse" aria-label="Close"></button>
                    </div>
                </div>
            </form>
        </div>
        <!-- End Site Navbar Seach -->
    </div>
</nav>
</spark-navbar>