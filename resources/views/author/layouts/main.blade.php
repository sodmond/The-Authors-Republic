<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>The Authors Republic - Author {{ $title }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="description" />
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">

        <!-- jvectormap -->
        <link href="{{ asset('backend/libs/jqvmap/jqvmap.min.css') }}" rel="stylesheet" />

        <!-- DataTables -->
        <link href="{{ asset('backend/libs/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('backend/libs/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css"/>
        
        <!-- App css -->
        <link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/css/app.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/css/custom.css') }}" rel="stylesheet" type="text/css" />

    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="{{ asset('backend/images/users/avatar-4.jpg') }}" alt="user-image" class="rounded-circle">
                            <span class="pro-user-name ml-1">
                                <?php $pre = str_split(Auth::user()->lastname); ?>
                                {{ ucwords(strtolower(Auth::user()->firstname)) . ' ' . strtoupper($pre[0]) }}. <i class="mdi mdi-chevron-down"></i> 
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h6 class="m-0">
                                    Welcome !
                                </h6>
                            </div>

                            <!-- item-->
                            <a href="{{-- route('user.profile') --}}" class="dropdown-item notify-item">
                                <i class="dripicons-user"></i>
                                <span>My Profile</span>
                            </a>

                            <!-- item-->
                            <a href="{{-- route('user.profile.password') --}}" class="dropdown-item notify-item">
                                <i class="dripicons-lock"></i>
                                <span>Change Password</span>
                            </a>

                            <div class="dropdown-divider"></div>

                            <!-- item-->
                            <a href="#" class="dropdown-item notify-item" data-toggle="modal" data-target="#logoutModal">
                                <i class="dripicons-power"></i>
                                <span>Logout</span>
                            </a>
                            <form id="logout-form" action="{{ route('author.logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </div>
                    </li>

                    <li class="dropdown notification-list">
                        <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                            <i class="fe-settings noti-icon"></i>
                        </a>
                    </li>

                </ul>

                <ul class="list-unstyled menu-left mb-0">
                    <li class="float-left">
                        <a href="index.html" class="logo">
                            <span class="logo-lg">
                                <img src="{{ asset('img/lg.png') }}" alt="" height="22">
                            </span>
                            <span class="logo-sm">
                                <img src="{{ asset('img/favicon.ico') }}" alt="" height="24">
                            </span>
                        </a>
                    </li>
                    <li class="float-left">
                        <a class="button-menu-mobile navbar-toggle">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                    </li>
                    <li class="app-search d-none d-md-block">
                        <form>
                            <input type="text" placeholder="Search..." class="form-control">
                            <button type="submit" class="sr-only"></button>
                        </form>
                    </li>
                </ul>
            </div>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="slimscroll-menu">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">

                            <li class="menu-title">Author Portal</li>

                            <li>
                                <a href="{{-- route('user.dashboard') --}}" class="{{ ($activePage == 'home') ? 'active' : '' }}">
                                    <i class="dripicons-meter"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>

                            <li>
                                <a href="{{-- route('author.orders') --}}" class="{{ ($activePage == 'books') ? 'active' : '' }}">
                                    <i class="dripicons-calendar"></i> 
                                    <span> Books </span>
                                </a>
                            </li>

                            <li>
                                <a href="{{-- route('author.orders') --}}" class="{{ ($activePage == 'orders') ? 'active' : '' }}">
                                    <i class="dripicons-calendar"></i> 
                                    <span> Orders </span>
                                </a>
                            </li>

                            <li>
                                <a href="{{-- route('author.payouts') --}}" class="{{ ($activePage == 'payouts') ? 'active' : '' }}">
                                    <i class="dripicons-briefcase"></i> 
                                    <span> Payouts </span>
                                </a>
                            </li>

                            <li>
                                <a href="{{-- route('author.settings') --}}" class="{{ ($activePage == 'settings') ? 'active' : '' }}">
                                    <i class="dripicons-briefcase"></i> 
                                    <span> Settings </span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="{{ ($activePage == 'account') ? 'active' : '' }}">
                                    <i class="dripicons-user"></i>
                                    <span> Account </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="{{-- route('user.profile') --}}">My Profile</a>
                                    </li>
                                    <li>
                                        <a href="{{-- route('user.profile.password') --}}">Change Password</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="menu-title mt-2">More</li>

                            <li>
                                <a href="" data-toggle="modal" data-target="#logoutModal">
                                    <i class="dripicons-power"></i>
                                    <span> Logout </span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ url('/') }}" target="_blank">
                                    <i class="dripicons-arrow-left"></i>
                                    <span> Visit website </span>
                                </a>
                            </li>

                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            <div class="content-page">

                @yield('content')

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                &copy; 2018 - 2019 {{ config('app.name') }} 
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->
            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

            <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="{{ route('author.logout') }}" onclick="event.preventDefault(); 
                                document.getElementById('logout-form').submit();">Logout</a>
                </div>
            </div>
        </div>
    </div>


        </div>
        <!-- END wrapper -->


        <!-- Vendor js -->
        <script src="{{ asset('backend/js/vendor.min.js') }}"></script>

        <!-- KNOB JS -->
        <script src="{{ asset('backend/libs/jquery-knob/jquery.knob.min.js') }}"></script>
        <!-- Chart JS -->
        <script src="{{ asset('backend/libs/chart-js/Chart.bundle.min.js') }}"></script>

        <!-- Jvector map -->
        <script src="{{ asset('backend/libs/jqvmap/jquery.vmap.min.js') }}"></script>
        <script src="{{ asset('backend/libs/jqvmap/jquery.vmap.usa.js') }}"></script>
        
        <!-- Datatable js -->
        <script src="{{ asset('backend/libs/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('backend/libs/datatables/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('backend/libs/datatables/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('backend/libs/datatables/responsive.bootstrap4.min.js') }}"></script>
        
        <!-- Dashboard Init JS -->
        <script src="{{ asset('backend/js/pages/dashboard.init.js') }}"></script>
        
        <!-- App js -->
        <script src="{{ asset('backend/js/app.min.js') }}"></script>

    </body>
</html>