<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        {{-- <div class="logo-src"></div> --}}
        <img src="{{ URL::to('assets/images/icon.jpeg')}} " alt="" style="width: 40px;">
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                    data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">

                <li class="app-sidebar__heading">Dashboards</li>

                <li>
                    <a href="/home" class="{{ isset($sidebar) && $sidebar == 'home' ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-display1"></i>
                        Beranda
                    </a>
                </li>

                @if (Auth::user()->jabatan == 'kasubag')
                <li>
                    <a href="/users" class="{{ isset($sidebar) && $sidebar == 'users' ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-add-user"></i>
                        Users
                    </a>
                </li>
                @endif

                <li>
                    <a href="/ellk" class="{{ isset($sidebar) && $sidebar == 'ellk' ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-news-paper"></i>
                        ELLK
                    </a>
                </li>

                @if (Auth::user()->jabatan != 'pegawai')
                <li>
                    <a href="/submited" class="{{ isset($sidebar) && $sidebar == 'submit' ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-upload"></i>
                        VERIFIKASI ELLK
                    </a>
                </li>
                @endif

                <li>
                    <a href="/panduan" class="{{ isset($sidebar) && $sidebar == 'panduan' ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-info"></i>
                        Panduan
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
