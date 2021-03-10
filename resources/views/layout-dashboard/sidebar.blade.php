 <nav class="fixed-top align-top" id="sidebar-wrapper" role="navigation">
            <div class="simplebar-content" style="padding: 0px;">
                <a class="sidebar-brand" href="/">
                    <span class="align-middle">Warung Kita</span>
                </a>
                <ul class="navbar-nav align-self-stretch">
                    <li class="">
                        <a href="/dashboard" class="nav-link text-left active {{ (request()->is('/*')) ? 'active' : '' }}" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="flaticon-bar-chart-1"></i> Dashboard
                        </a>
                    </li>
                    @if(auth()->user()->role == 'Administrator') 
                        <li class="">
                            <a href="/activity" class="nav-link text-left {{ (request()->is('activity*')) ? 'active' : '' }}" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="flaticon-bar-chart-1"></i> Activity Log
                            </a>
                        </li>
                        <li class="">
                            <a href="/user" class="nav-link text-left {{ (request()->is('user*')) ? 'active' : '' }}" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="flaticon-bar-chart-1"></i> User
                            </a>
                        </li>
                        <li class="">
                            <a href="/menu" class="nav-link text-left {{ (request()->is('menu*')) ? 'active' : '' }}" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="flaticon-bar-chart-1"></i> Menu
                            </a>
                        </li>
                        <li class="has-sub">
                            <a class="nav-link collapsed text-left {{ (request()->is('order*')) ? 'active' : '' }}" href="#collapseExample2" role="button"
                                data-toggle="collapse">
                                <i class="flaticon-user"></i> Order
                            </a>
                            <div class="collapse menu mega-dropdown" id="collapseExample2">
                                <div class="dropmenu" aria-labelledby="navbarDropdown">
                                    <div class="container-fluid ">
                                        <div class="row">
                                            <div class="col-lg-12 px-2">
                                                <div class="submenu-box">
                                                    <ul class="list-unstyled m-0">
                                                        <li><a href="/order">Order</a></li>
                                                        <li><a href="/order/list">List Order</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="">
                            <a href="/laporan" class="nav-link text-left {{ (request()->is('laporan*')) ? 'active' : '' }}" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="flaticon-bar-chart-1"></i> Laporan
                            </a>
                        </li>
                        <li class="">
                            <a href="/akun" class="nav-link text-left {{ (request()->is('akun*')) ? 'active' : '' }}" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="flaticon-bar-chart-1"></i> Akun
                            </a>
                        </li>
                    @endif
                    @if(auth()->user()->role == 'Kasir') 
                        <li class="">
                            <a href="/menu" class="nav-link text-left {{ (request()->is('menu*')) ? 'active' : '' }}" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="flaticon-bar-chart-1"></i> Menu
                            </a>
                        </li>
                        <li class="">
                            <a href="/order/list" class="nav-link text-left {{ (request()->is('order/list*')) ? 'active' : '' }}" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="flaticon-bar-chart-1"></i> List Order
                            </a>
                        </li>
                        <li class="">
                            <a href="/akun" class="nav-link text-left {{ (request()->is('akun*')) ? 'active' : '' }}" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="flaticon-bar-chart-1"></i> Akun
                            </a>
                        </li>
                    @endif
                    @if(auth()->user()->role == 'Waiter') 
                        <li class="">
                            <a href="/menu" class="nav-link text-left {{ (request()->is('menu*')) ? 'active' : '' }}" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="flaticon-bar-chart-1"></i> Menu
                            </a>
                        </li>
                        <li class="">
                            <a href="/akun" class="nav-link text-left {{ (request()->is('akun*')) ? 'active' : '' }}" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="flaticon-bar-chart-1"></i> Akun
                            </a>
                        </li>
                    @endif
                    @if(auth()->user()->role == 'Owner') 
                        <li class="">
                            <a href="/user" class="nav-link text-left {{ (request()->is('user*')) ? 'active' : '' }}" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="flaticon-bar-chart-1"></i> User
                            </a>
                        </li>
                        <li class="">
                            <a href="/order/list" class="nav-link text-left {{ (request()->is('order/list*')) ? 'active' : '' }}" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="flaticon-bar-chart-1"></i> List Order
                            </a>
                        </li>
                        <li class="">
                            <a href="/menu" class="nav-link text-left {{ (request()->is('menu*')) ? 'active' : '' }}" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="flaticon-bar-chart-1"></i> Menu
                            </a>
                        </li>
                        <li class="">
                            <a href="/laporan" class="nav-link text-left {{ (request()->is('laporan*')) ? 'active' : '' }}" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="flaticon-bar-chart-1"></i> Laporan
                            </a>
                        </li>
                        <li class="">
                            <a href="/akun" class="nav-link text-left {{ (request()->is('akun*')) ? 'active' : '' }}" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="flaticon-bar-chart-1"></i> Akun
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>