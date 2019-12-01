<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible"
        content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token"
        content="{{ csrf_token() }}">

    <title>Admin Panel</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet"
        href="{{ asset('font-awesome/css/font-awesome.min.css') }}">
    <link href="{{ asset('css/app.css') }}"
        rel="stylesheet">

    <style>
        .custom-paginate {
            float: right;
            margin-right: 30px;
        }

        .router-anim-enter-active,
        .router-anim-leave-active {
            transition: opacity .3s ease;
        }

        .router-anim-enter,
        .router-anim-leave-to

        /* .component-fade-leave-active below version 2.1.8 */
            {
            opacity: 0;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper"
        id="app">
        <!-- Navbar -->
        @include('includes.topnav')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ url('/') }}"
                class="brand-link">
                <img src="{{ asset('logo.png') }}"
                    alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Booking</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('Admin.png') }}"
                            class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#"
                            class="d-block">{{Auth::user()->name}}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                @include('includes.sidenav')
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- for example router view -->
            <transition name="router-anim"
                mode="out-in">
                <router-view></router-view>
            </transition>

            <!-- set progressbar -->
            <!-- <vue-progress-bar></vue-progress-bar> -->

        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-sm-none d-md-block">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; {{ date('Y') }} <a href="#">Adil Abbas</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"
        defer></script>
</body>

</html>