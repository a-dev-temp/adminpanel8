<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | @yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('vendors/adminlte') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('vendors/adminlte') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendors/adminlte') }}/dist/css/adminlte.min.css">
    @stack('css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('vendors/adminlte') }}/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ asset('vendors/adminlte') }}/index3.html" class="brand-link">
                <img src="{{ asset('vendors/adminlte') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('vendors/adminlte') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <span class="d-block" style="color:#c2c7d0;">@yield('user')</span>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                        <li class="nav-header">General</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link @yield('dashboard')">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link @yield('pages')">
                                <i class="nav-icon fas fa-folder"></i>
                                <p>Pages</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link @yield('posts')">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>Posts</p>
                            </a>
                        </li>
                        <li class="nav-item @yield('category-open')">
                            <a href="#" class="nav-link @yield('category')">
                                <i class="nav-icon fas fa-file"></i>
                                <p>Category <i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('category.index') }}" class="nav-link @yield('category-list')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('category-group.index') }}" class="nav-link @yield('category-group')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Group</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-header">Ecommerce</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link @yield('product')">
                                <i class="nav-icon fas fa-shopping-cart"></i>
                                <p>Product <i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./index2.html" class="nav-link @yield('product-list')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./index3.html" class="nav-link @yield('product-variant')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Varians</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link @yield('variants')">
                                <i class="nav-icon fas fa-cash-register"></i>
                                <p>History</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link @yield('manual-order')">
                                <i class="nav-icon fas fa-shopping-basket"></i>
                                <p>Manual Order</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->

            <div class="sidebar-custom">
                <a href="{{ route('setting.index') }}" class="btn btn-link"><i class="fas fa-cogs"></i></a>
                <a href="#" class="btn btn-secondary hide-on-collapse pos-right"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
            <!-- /.sidebar-custom -->
        </aside>


        {{ $slot }}

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <small>Created with <img src="https://c.tenor.com/RGDFz-rHPYAAAAAi/heart-th%E1%BA%A3.gif" width="16px"> by <a href="https://www.instagram.com/_anggarista/" target="_blank">Angga</a></small>
            </div>
            <small><a href="https://adminlte.io">AdminLTE.io</a> &copy; 2014-2021 | v 3.1.0</small>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('vendors/adminlte') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('vendors/adminlte') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('vendors/adminlte') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('vendors/adminlte') }}/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('vendors/adminlte') }}/dist/js/demo.js"></script>
    @stack('js')
</body>

</html>