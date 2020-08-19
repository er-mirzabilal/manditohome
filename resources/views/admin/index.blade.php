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

    @include('admin.partials.navigation')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

          @include('admin.partials.header')

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
                        <a href="{{route('viewcustomers')}}" style="text-decoration:none;">
                            <div class="card border-left-success shadow h-90 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase " style="font-size:15px;">Total Customers</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">@if($customer){{$customer}} @else {{'No Registered Customer'}} @endif</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-users fa-2x text-gray-300" style="font-size:40px;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <a  style="text-decoration:none;">
                            <div class="card border-left-primary shadow h-90 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase " style="font-size:15px;">Todays Sale</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Pkr: @if($sale[0]->total){{$sale[0]->total}} @else {{'0'}} @endif</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-money text-gray-300" style="font-size:40px;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <a href="{{route('viewproducts')}}" style="text-decoration:none;">
                            <div class="card border-left-success shadow h-90 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase " style="font-size:15px;">Available Products</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">@if($product){{$product}} @else {{'No active product'}} @endif</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-list fa-2x text-gray-300" style="font-size:40px;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>






                </div>
                <br>
                <h5>Todays Pending Orders</h5>
                <hr>
                <div class="row">
                    @if($areaWise->count()>0)
                    @foreach($areaWise as $aw)
                       <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <a href="/admin/orders?area={{$aw->delivery_area}}" style="text-decoration: none;">
{{--                                <form action="{{route('areawisefilter')}}" class="orderFilterForm" method="POST" style="cursor:pointer;">--}}
                                        {{csrf_field()}}
                                        <input type="hidden" name="textfield" value="{{$aw->delivery_area}}">
                                    <div class="card border-left-info shadow h-90 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-info text-uppercase " style="font-size:15px;">{{$aw->delivery_area}}</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$aw->total}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fa fa-home text-gray-300" style="font-size:40px;"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
{{--                                    </form>--}}
                            </div>
                        @endforeach
                        @else
                        <h6>No Pending orders for today.</h6>
                        @endif
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
{{--        <footer class="sticky-footer bg-white">--}}
{{--            <div class="container my-auto">--}}
{{--                <div class="text-center my-auto">--}}
{{--                    <span>Copyright &copy; Q@RI <script>document.write(new Date().getFullYear());</script></span>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </footer>--}}
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
<script>
    $(document).ready(function(){
     $(".orderFilterForm").click(function(){
      $(this).submit();
     });
    });
</script>

</body>

</html>

