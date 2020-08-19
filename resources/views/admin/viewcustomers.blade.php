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
                    <h1 class="h3 mb-0 text-gray-800">All Customers List</h1>
                    @if(session()->has('success'))
                        <div class="alert alert-success" style="float:right;margin-bottom:5px;" id="success-alert">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                </div>
                <!-- Content Row -->
                <div class="row">

                    <div class="col card shadow mb-4" style="padding:0px;">
                        <div class="card-header" style="padding:0px;padding-top:15px;">
                            <div class="row">
                                <div class="col-sm-6 col-md-5">
                                    <div class="dataTables_info" style="padding-top:10px;padding-left:10px;" id="dataTable_info" role="status" aria-live="polite">
                                        Showing {{count($users)}} entries
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-7" >
                    <span style="float:right;padding:10px;">
                     @if(count($users)>0)
                            {{ $users->links() }}
                        @endif
                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            @if($users->isEmpty())
                                <h5 style="text-align:center;display:block;margin:20px;">No customer is registered yet.</h5>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr style="text-align:center;">
                                            <th>ID</th>
                                            <th>Customer Name</th>
                                            <th>Contact #</th>
                                            <th>Address</th>
                                            <th>Loyalty Points</th>
                                            <th>Register Date</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($users as $u)
                                            <tr class="text-center">
                                                <td>{{$u->id}}</td>
                                                <td>{{$u->name}}</td>
                                                <td>{{$u->email}}</td>
                                                <td>{{$u->address}}</td>
                                                <td>{{$u->loyalty_points}}</td>
                                                <td> @php $time=0; @endphp
                                                    <span style="display:none;">{{$time= strtotime($u->created_at)}}</span>
                                                    @php echo date('d',$time).' '.date('M',$time).' '.date('Y',$time).' '; @endphp
                                                </td>

                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>



                    </div>

                </div>
                <!-- End Content Row -->

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

