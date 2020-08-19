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
                <div class="d-sm-flex align-items-center justify-content-between" style="padding-bottom:20px;">
                    <h1 class="h3 mb-0 text-gray-800">All Delivery Areas</h1>
                    @if(session()->has('success'))
                        <div class="alert alert-success" style="float:right;margin-bottom:5px;" id="success-alert">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                </div>
                <!-- Content Row -->
                <div class="row">
                    <form action="{{route('addarea')}}" method="POST" style="width:100%;">
                        {{ csrf_field() }}
                        <div class="row justify-content-center" style="padding:5px;">
                            <div class="form-group col-sm-3">
                                <label>Area Name</label>
                                <input type="text" class="form-control" required minlength="4" name="areaname" placeholder="Enter Area Name">
                            </div>
                            <div class="form-group col-sm-3">
                                <label>Area Shipping Fee</label>
                                <input type="number" min="0" class="form-control" required name="areaprice" placeholder="Enter Area Shipping Fee">
                            </div>
                            <div class="form-group col-sm-3">
                                <label>Area Status</label>
                                <select name="areastatus" class="form-control" required>
                                    <option value="1">Enabled</option>
                                    <option value="0">Disabled</option>
                                </select>
                            </div>
                            <div class="col-sm-3" style="padding-top: 30px;">
                                <button class="btn btn-success" name="addarea"><i class="fa fa-plus"></i> Add New Area</button>
                            </div>

                        </div>
                    </form>

                    <div class="col card shadow mb-4" style="padding:0px;">
                        <div class="card-header" style="padding:0px;padding-top:15px;">
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="dataTables_info text-center" style="padding-top:10px;padding-left:10px;" id="dataTable_info" role="status" aria-live="polite">
                                        <h5>Added Delivery Areas</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            @if($area->isEmpty())
                                <h5 style="text-align:center;display:block;margin:20px;">No area is added yet.</h5>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr style="text-align:center;">
                                            <th>ID</th>
                                            <th>Area Name</th>
                                            <th>Area Shipping Fee</th>
                                            <th>Area Status</th>
                                            <th>Action</th>

                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($area as $a)
                                            <form action="{{route('updatearea',$a->id)}}" method="POST">
                                                {{ csrf_field() }}
                                                <tr class="text-center">
                                                    <td>{{$a->id}}</td>
                                                    <td><input type="text" class="form-control" required minlength="4" name="updateareaname" value="{{$a->name}}"></td>
                                                    <td><input type="number" class="form-control" required min="0" name="updateareaprice" value="{{$a->shipping_price}}"></td>
                                                    <td>
                                                        <select name="updateareastatus" class="form-control" required >
                                                            <option @if($a->available==1) {{'selected'}} @endif value="1">Enabled</option>
                                                            <option @if($a->available==0) {{'selected'}} @endif value="0">Disabled</option>
                                                        </select>
                                                    </td>

                                                    <td>
                                                        <attr title="Update Area"><button class="btn btn-warning" type="submit"><i class="fa fa-pencil"></i> Update</button></attr>
                                                    </td>
                                                </tr>
                                            </form>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>



                    </div>

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
    $(document).ready(function() {
        $("#success-alert").fadeTo(2000, 500).slideUp(500, function () {
            $("#success-alert").slideUp(500);
        });

    });
</script>

</body>

</html>

