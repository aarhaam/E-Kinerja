<nav class="header-navbar main-header-navbar navbar-expand-lg navbar navbar-with-menu fixed-top ">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="javascript:void(0);"><i class="ficon bx bx-menu"></i></a></li>
                    </ul>
                </div>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="javascript:void(0);" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none"><span class="user-name">{{ Auth::user()->name }}</span><span class="user-status text-muted">{{ Auth::user()->occupation }}</span></div><span><img class="round" src="{{ url('admin/app-assets/images/portrait/small/avatar-s-11.jpg') }}" alt="avatar" height="40" width="40"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right pb-0">
{{--                            <a class="dropdown-item" href="page-user-profile.html"><i class="bx bx-user mr-50"></i>Profile</a>--}}
{{--                            <div class="dropdown-divider mb-0"></div>--}}
                            @auth
                                <a class="dropdown-item" href="{{ url('/logout') }}"><i class="bx bx-power-off mr-50"></i> Logout</a>
                            @endauth
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
