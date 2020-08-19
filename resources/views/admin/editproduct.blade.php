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
                    <h1 class="h3 mb-0 text-gray-800">Edit Product</h1>

                </div>
                <!-- Content Row -->
                <div class="row flex-lg-nowrap">
                    <div class="col">
                        <div class="row">
                            <div class="col mb-3">
                                <div class="card">
                                    <div class="card-body">

                                        <form action="{{route('editproductsubmit',$product->id)}}" id="editproductform" enctype="multipart/form-data" method="POST">
                                            {{ csrf_field() }}

                                            <div class="e-profile">

                                                <div class="row">

                                                    <div class="col-12 col-sm-auto mb-3">
                                                        <div class="mx-auto" style="width: 140px;">
                                                            <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
                                                                <img id="image_block" alt="{{$product->picture}}" src="{{asset('/img/products/'.$product->picture)}}" style="width:160px;height:140px;border-radius:5px;">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                                        <div class="text-center text-sm-left mb-2 mb-sm-0">
                                                            <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"></h4>
                                                            <p class="mb-0"></p>
                                                            <div class="text-muted"><small>
                                                                <?php //$time= strtotime($product[0]->created_at); ?>
                                                                <!-- Added at <?php //echo date('d',$time).' '.date('M',$time).' '.date('Y',$time).' ';?> -->
                                                                </small></div>
                                                            <div class="mt-2">
                                                                <input type="file" id="image" name="image" style="display:none;">
                                                                <button class="btn btn-success" type="button" id="fileselect">
                                                                    <i class="fa fa-fw fa-camera"></i>
                                                                    <span>Change Photo</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="text-center text-sm-right">
                                                        <!-- <span class="badge badge-secondary">Admin</span>
                    <div class="text-muted"><small>
                    <?php //$time= strtotime($User->created_at); ?>
                                                            Joined <?php //echo date('d',$time).' '.date('M',$time).' '.date('Y',$time).' ';?>
                                                            </small></div>
                                                          </div> -->
                                                        </div>

                                                    </div>

                                                </div>


                                                <ul class="nav nav-tabs" >
                                                    <li class="nav-item"><a href="" class="active nav-link">Product Details</a></li>
                                                    <li style="width:90%;">
                                                        @if(session()->has('success'))
                                                            <div class="alert alert-success" style="float:right;margin-bottom:5px;" id="success-alert">
                                                                {{ session()->get('success') }}
                                                            </div>
                                                        @endif
                                                    </li>
                                                </ul>

                                                <div class="tab-content pt-3">
                                                    <div class="tab-pane active">
                                                        <div class="row">

                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Full Name</label>
                                                                    <input class="form-control" value="{{$product->name}}" type="text" minlength="4" name="name" placeholder="Enter Product Name" required >
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Product Price</label>
                                                                    <input class="form-control" value="{{$product->price}}" type="number" min="1" name="price" placeholder="Enter product price" required >
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Product Status</label>
                                                                    <select required name="status" class="form-control">
                                                                        <option @if($product->status==1){{'selected'}} @endif value="1">Enabled</option>
                                                                        <option @if($product->status==0){{'selected'}} @endif value="0">Disabled</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="row">

                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Sell Type: (Sell in dozens or Kg)</label>
                                                                    <select name="sell_type" required class="form-control">
                                                                        <option value="">Select Sell Type</option>
                                                                        <option @if($product->sell_type=='kg'){{'selected'}} @endif value="kg">Kg</option>
                                                                        <option @if($product->sell_type=='dozen'){{'selected'}} @endif value="dozen">Dozen</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Enter Quantity Step: (Enter only Numbers)</label>
                                                                    <input class="form-control" value="{{$product->quant_step}}" type="text" required name="quant_step" placeholder="For Example : 0.25 => 250 grams">
                                                                </div>
                                                            </div>
                                                            <div class="col justify-content-center" >
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label>Product Category</label>
                                                                        <select name="cat_id" required class="form-control">
                                                                            <option value="">Select Category</option>
                                                                            @foreach($category as $c)
                                                                                <option @if($product->cat_id==$c->id){{'selected'}} @endif value="{{$c->id}}">{{$c->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-sm-6 text-center" style="padding-top:32px;">
                                                                        <input type="hidden" name="prevPicture" value="{{$product->picture}}">
                                                                        <button class="btn btn-success"  type="submit"><i class="fa fa-pencil"></i> Edit Product</button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>




                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

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
    $(document).ready(function(){
        $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#success-alert").slideUp(500);
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image_block').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#image").change(function(){
            readURL(this);
        });

        $("#fileselect").on('click',function(){
            $("#image").click();
        });
    });
    //
    // $(document).on('submit','#editproductform',function(e){
    //     e.preventDefault();
    //
    //     var img=$("#image").val();
    //     if(img!="")
    //     {
    //         this.submit();
    //     }
    //     else
    //     {
    //         alert('Please select Product Image !');
    //     }
    //
    // });
</script>

</body>

</html>

