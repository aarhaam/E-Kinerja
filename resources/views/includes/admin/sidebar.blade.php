<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="../../../html/ltr/vertical-menu-boxicons-template/index.html">
                    <div class="brand-logo">
                        <img src="{{ url('logo-siakad.png') }}" width="20px" style="margin-top: -10px;">
                    </div>
                    <h5 class="mb-0">Jurnal Harian</h5>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="bx bx-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="bx-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        @if(Auth::user()->status == 'admin')
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="">
                <li class="nav-item"><a href="{{ url('/admin-dashboard') }}"><i class="bx bx-home"></i><span class="menu-title text-truncate" data-i18n="Karyawan">Dashboard</span></a>
                </li>
                <li class="nav-item"><a href="{{ url('/admin-employee') }}"><i class="bx bx-group"></i><span class="menu-title text-truncate" data-i18n="Karyawan">Karyawan</span></a>
                </li>
                <li class="nav-item"><a href="{{ url('/admin-indicator') }}"><i class="bx bx-line-chart"></i><span class="menu-title text-truncate" data-i18n="Karyawan">Indikator Karyawan</span></a>
                </li>
                <li class="nav-item"><a href="{{ url('/admin-structural') }}"><i class="bx bxs-user-badge"></i><span class="menu-title text-truncate" data-i18n="Karyawan">Struktural</span></a>
                </li>
            </ul>
        @else
            @if(isset($head))
                <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="">
                    <li class="nav-item"><a href="{{ url('/employee-dashboard') }}"><i class="bx bx-home"></i><span class="menu-title text-truncate" data-i18n="Karyawan">Dashboard</span></a>
                    </li>
                    <li class="nav-item"><a href="{{ url('/employee-subordinate-performance') }}"><i class="bx bx-chart"></i><span class="menu-title text-truncate" data-i18n="Karyawan">Kinerja Bawahan</span></a>
                    </li>
                </ul>
            @endif
        @endif

    </div>
</div>
