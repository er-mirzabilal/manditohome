<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--====== Title ======-->
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fav Icon -->
    <link rel="shortcut icon" href="{{asset('/ico/favicon.ico')}}" type="image/x-icon">

    <!-- Custom fonts for this template-->
    <link href="{{asset('/css/plugin/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center bg-white" href="{{route('index')}}">
            <div class="sidebar-brand-icon">
                <img style="width:40px" src="{{asset('img/logo/admin-icon.png')}}" alt="logo-icon">
            </div>
            <div class="sidebar-brand-text mx-3"><img style="width:150px;" src="{{asset('img/logo/admin-logo.png')}}" alt="logo"></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{route('customerhome')}}">
                <i class="fa fa-fw fa-tachometer"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <li class="nav-item">
            <a class="nav-link" href="{{route('customervieworder')}}">
                <i class="fa fa-table fa-2x"></i>
                <span>View Orders</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('loyaltypoints')}}">
                <i class="fa fa-money fa-2x"></i>
                <span>My Loyalty Points</span></a>
        </li>

        <hr class="sidebar-divider d-none d-md-block">
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>



                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">


                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"> {{ Auth::user()->name }} </span>
                            <img class="img-profile rounded-circle" src="{{asset('img/users/user.png')}}">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                            <a class="dropdown-item" href="{{route('logout')}}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

                </div>
                <!-- Content Row -->
                <div class="row">


                <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <a href="{{route('customervieworder')}}" style="text-decoration:none;">
                            <div class="card border-left-success shadow h-90 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase " style="font-size:15px;">View Orders</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">@php if($orders>0){ echo $orders; } else{ echo 'No new Order';} @endphp</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-table fa-2x text-gray-300" style="font-size:40px;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                                        <div class="col-xl-3 col-md-6 mb-4">
                                            <a href="{{route('loyaltypoints')}}" style="text-decoration:none;">
                                                <div class="card border-left-info shadow h-90 py-2">
                                                    <div class="card-body">
                                                        <div class="row no-gutters align-items-center">
                                                            <div class="col mr-2">
                                                                <div class="text-xs font-weight-bold text-info text-uppercase " style="font-size:15px;">My Loyalty Points</div>
                                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$points}}</div>
                                                            </div>
                                                            <div class="col-auto">
                                                                <i class="fa fa-money text-gray-300" style="font-size:40px;"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>



                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="text-center my-auto">
                    <span>Copyright &copy; Q@RI <script>document.write(new Date().getFullYear());</script></span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <form method="POST">
                    <input type="submit" class="btn btn-primary" name="logout" value="Logout">
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="{{asset('/js/plugin/jquery-2.2.4.min.js')}}"></script>
<script src="{{asset('/js/plugin/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('/js/plugin/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('/js/plugin/sb-admin-2.min.js')}}"></script>


</body>

</html>

