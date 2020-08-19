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
    <link href="{{asset('/css/theme.css')}}" rel="stylesheet">
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
                    <h1 class="h3 mb-0 text-gray-800">All Products</h1>
                    @if(session()->has('success'))
                        <div class="alert alert-success" style="float:right;margin-bottom:5px;" id="success-alert">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                </div>
                <!-- Content Row -->
                <div class="row">

                    @if($products->isEmpty())
                        <h5 style="text-align:center;display:block;margin:20px;">No Product added yet.</h5>
                    @else
                        @foreach($products as $p)
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <div class="product-box">
                                    <div class="product-media" style="height:140px;">
                                        <img class="prod-img" style="width:130px;height:130px;position:absolute;" alt="{{$p->picture}}" src="{{asset('/img/products/'.$p->picture)}}">
                                        <img class="shape" alt="shap-small.png" src="{{asset('/img/icons/shap-small.png')}}">
                                    </div>
                                    <div class="product-caption" style="padding-top:0px; padding-bottom:15px;">
                                            <h3 class="product-title" style="margin-bottom: 0px;margin-top:0px;">
                                                <a> <span class="light-font"> {{$p->name}} </span></a>
                                            </h3>
                                                    <p class="text-center" style="padding-top:0px;padding-bottom:0px;margin-bottom:0px;">Category: <strong>{{$p->Category->name}}</strong></p>
                                                    <p class="text-center" style="padding-top:0px;padding-bottom:0px;margin-bottom:0px;">Status: <strong>@if($p->status==1){{'Enable'}} @else {{'Disable'}} @endif</strong></p>
                                            <div class="price">
                                                <strong class="clr-txt">Pkr <span class="price-span">{{$p->price}}</span> </strong>
                                            </div>
                                            <a href="{{route('editproduct',$p->id)}}" style="display:inline-block;">
                                            <button type="submit" style="margin-top:10px;min-width:0px;line-height:normal;padding:8px;height:auto;" class="theme-btn btn"> <strong> <i class="fa fa-pencil"></i> Edit</strong> </button>
                                            </a>
                                            <form id="delform" action="{{route('deleteproduct')}}" method="POST" style="display:inline-block;">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <input type="hidden" name="id" value="{{$p->id}}">
                                                <button type="submit" class="theme-btn btn" id="delbtn" style="margin-top:10px;min-width:0px;line-height:normal;padding:8px;height:auto;"><strong><i class="fa fa-trash"></i> Delete</strong></button>
                                            </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <!-- end Content Row-->

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
        $("#success-alert").fadeTo(3000, 500).slideUp(500, function(){
            $("#success-alert").slideUp(500);
        });
    });


    $(document).on('submit','#delform',function(e){
        e.preventDefault();

        if(confirm('Are you sure, this will delete product from Database?'))
        {
            this.submit();
        }
    });
</script>

</body>

</html>


