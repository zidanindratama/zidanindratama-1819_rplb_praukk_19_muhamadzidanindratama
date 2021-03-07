<nav class="navbar navbar-expand navbar-light my-navbar">
                        <!-- Sidebar Toggle (Topbar) -->
                        <div type="button" id="bar" class="nav-icon1 hamburger animated fadeInLeft is-closed"
                            data-toggle="offcanvas">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown">
                                    @if (Route::has('login'))
                                            @auth
                                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
                                            @endauth
                                        </div>
                                    @endif
                                </a>
                            </li>
                        </ul>
                    </nav>