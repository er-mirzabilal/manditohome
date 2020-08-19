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
    <style>
        .form-control{display:inline-block;width:auto;}
    </style>

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
        <li class="nav-item">
            <a class="nav-link" href="{{route('customerhome')}}">
                <i class="fa fa-fw fa-tachometer"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <li class="nav-item active">
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
                    <h1 class="h3 mb-0 text-gray-800">All Orders</h1>
                    @if(session()->has('success'))
                        <div class="alert alert-success" style="float:right;margin-bottom:5px;" id="success-alert">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                </div>
                <!-- Content Row -->
                <div class="row">

                    <div class="col card shadow mb-4" id="orderfilter-div" style="padding:0px;">
                        <div class="card-header" style="padding:0px;padding-top:15px;">
                            <div class="row">

                                <div class="col-sm-4">
                                    <div class="col-md-8 col-sm-12" style="float:right;padding-top:5px;">
                                      Showing entries : {{count($orders)}}
                                    </div>
                                    {{--                    <input type="text" name="textfield" id="textfield" value="@if(isset($textfield)){{$textfield}}@endif" style="float:right;" class="form-control" placeholder="Search Name/Contact/Area">--}}
                                </div>
                                <div class="col-sm-4 text-center" >
                                    <label>From : </label>
                                    <input type="date" style="margin-bottom:10px;" value="<?php date_default_timezone_set("Asia/Karachi"); echo date('Y-m-d');?>" name="datefrom" id="datefrom" class="form-control">
                                </div>
                                <div class="col-sm-4">
                                    <label>To : </label>
                                    <input type="date" style="margin-bottom:10px;" value="<?php date_default_timezone_set("Asia/Karachi"); echo date('Y-m-d');?>" name="dateto" id="dateto" class="form-control" >
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            @if($orders->isEmpty())
                                <h5 style="text-align:center;display:block;margin:20px;">No order is placed yet.</h5>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr style="text-align:center;">
                                            <th>ID</th>
                                            <th>Deliver to</th>
                                            <th>Order Price</th>
                                            <th>Status</th>
                                            <th>Added At</th>
                                            <th>Action</th>

                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($orders as $od)
                                            <tr class="text-center">
                                                <td>{{$od->id}}</td>
                                                <td>{{$od->delivery_area}}</td>
                                                <td>{{$od->order_price}}</td>
                                                <td>{{$od->order_status}}</td>
                                                <td> @php $time=0; @endphp
                                                    <span style="display:none;">{{$time= strtotime($od->created_at)}}</span>
                                                    @php echo date('d',$time).' '.date('M',$time).' '.date('Y',$time).' '; @endphp
                                                </td>
                                                <td>
                                                    <input type="hidden" class="ordertotal" value="{{$od->order_price}}">
                                                    <input type="hidden" class="orderid" value="{{$od->id}}">
                                                    <attr title="View Details"><button class="btn btn-warning getdetails_btn" type="button"><i class="fa fa-external-link"></i></button></attr>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                        <div class="card-footer" style="padding-bottom:0px;">
                            <span style="float:right;">
                     @if(count($orders)>0)
                                    {{ $orders->links() }}
                                @endif
                    </span>
                        </div>


                    </div>

                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
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
<div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Order Detail</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" id="orderModalBody"></div>
            <div class="modal-footer">
                <div class="col align-middle">
                    <p style="font-weight:700;font-family: 'Playfair Display', serif;font-size:20px;" id="orderModalTotal"></p>
                </div>
                <div class="col text-right">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                </div>
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
        $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#success-alert").slideUp(500);
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click','.page-item .ajax-link',function(e){
            e.preventDefault();
            var page=$(this).attr('href').split('page=')[1];
            fetch_data(page);
        });
        function fetch_data(page)
        {
            var datefrom=$("#datefrom").val();
            var dateto=$("#dateto").val();
            var url="/customer/orderfilter?page="+page;
            $.ajax({
                type:'POST',
                url: url,
                data:{datefrom:datefrom,dateto:dateto},
                success:function(data){
                    $("#orderfilter-div").html(data);
                    $('.page-item').find('a').each(function() {
                        $(this).addClass('ajax-link');
                    })
                }
            });
        }

        $(document).on('input','#datefrom,#dateto', function () {
            var datefrom=$("#datefrom").val();
            var dateto=$("#dateto").val();
            var url="{{route('orderfiltercustomer')}}";
            $.ajax({
                type:'POST',
                url: url,
                data:{datefrom:datefrom,dateto:dateto},
                success:function(data){
                    $("#orderfilter-div").html(data);
                    $('.page-item').find('a').each(function() {
                        $(this).addClass('ajax-link');
                    })
                }
            });
        });

        $(document).on('click','.getdetails_btn',function(){
            var id=$(this).parent().parent().find('.orderid').val();
            var total=$(this).parent().parent().find('.ordertotal').val();
            var url = "{{ route('customerorderdetails','id') }}";
            url = url.replace('id', id);

            $.ajax({
                type:'POST',
                url: url,
                data:{id:id},
                success:function(data){
                    $('#orderModalBody').html(data);
                    $("#orderModalTotal").html('SubTotal : Pkr '+total);
                    $('#orderModal').modal('toggle');
                }
            });
        });

    });
</script>

</body>

</html>
