<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | {{ $title }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('/admin_user') }}/plugins/fontawesome-free/css/all.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('/admin_user') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ asset('/admin_user') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('/admin_user') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('/admin_user') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/admin_user') }}/dist/css/adminlte.min.css">

    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('/admin_user') }}/plugins/toastr/toastr.min.css">

    @yield('style')
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="{{ asset('/admin_user') }}/dist/img/AdminLTELogo.png" alt="AdminLTELogo"
                height="60" width="60">
        </div>

        <!-- Navbar -->
        @include('layouts.admin.components.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layouts.admin.components.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">{{ $title }}</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                @forelse ($breadcrumb as $index => $item)
                                    @if ($index == count($breadcrumb) - 1)
                                        <li class="breadcrumb-item active">
                                            {{ $item }}
                                        </li>
                                    @else
                                        {{-- check if its array --}}
                                        @if (is_array($item))
                                            <li class="breadcrumb-item"><a href="{{ $item['url'] }}">
                                                    {{ $item['text'] }}
                                                </a></li>
                                        @else
                                            <li class="breadcrumb-item">
                                                {{ $item }}
                                            </li>
                                        @endif
                                    @endif
                                @empty
                                @endforelse
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div><!--/. container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{ asset('/admin_user') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('/admin_user') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('/admin_user') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    {{-- @if (Route::is('admin.index')) --}}
    <script src="{{ asset('/admin_user') }}/dist/js/adminlte.js"></script>
    {{-- @endif --}}

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{ asset('/admin_user') }}/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="{{ asset('/admin_user') }}/plugins/raphael/raphael.min.js"></script>
    <script src="{{ asset('/admin_user') }}/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="{{ asset('/admin_user') }}/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="{{ asset('/admin_user') }}/plugins/chart.js/Chart.min.js"></script>

    <!-- DataTables  & Plugins -->
    <script src="{{ asset('/admin_user') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('/admin_user') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('/admin_user') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('/admin_user') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('/admin_user') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('/admin_user') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('/admin_user') }}/plugins/jszip/jszip.min.js"></script>
    <script src="{{ asset('/admin_user') }}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('/admin_user') }}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('/admin_user') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('/admin_user') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('/admin_user') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('/admin_user') }}/dist/js/demo.js"></script>

    @if (Route::is('admin.index'))
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{ asset('/admin_user') }}/dist/js/pages/dashboard2.js"></script>
    @endif
    <!-- Toastr -->
    <script src="{{ asset('/admin_user') }}/plugins/toastr/toastr.min.js"></script>

    @yield('script')

    {{-- alert toastr --}}
    @if (session('success'))
        <script>
            toastr.success('success', "{{ session('success') }}")
        </script>
    @elseif (session('error'))
        <script>
            toastr.error('error', "{{ session('error') }}")
        </script>
    @endif
</body>

</html>
