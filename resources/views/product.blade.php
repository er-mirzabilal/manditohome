<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
 @include('partials.css')
    <style>
        .theme-tabs.small a
        {
            line-height:normal;
            height:auto;
        }
    </style>
</head>

    <body id="home" class="wide">

{{--        <div id="loading">--}}
{{--            <div class="loader">--}}
{{--                <div class="dot"></div>--}}
{{--                <div class="dot"></div>--}}
{{--                <div class="dot"></div>--}}
{{--                <div class="dot"></div>--}}
{{--                <div class="dot"></div>--}}
{{--            </div>--}}
{{--        </div>--}}

        <!-- WRAPPER -->
        <main class="wrapper">
            <!-- CONTENT AREA -->

         @include('partials.header')

            <!--Breadcrumb Section Start-->
            <section class="breadcrumb-bg">
                <div class="theme-container container ">
                    <div class="site-breadcumb white-clr">
                        <h2 class="section-title"> <strong class="clr-txt">naturix </strong> <span class="light-font">Shop </span> </h2>
                        <ol class="breadcrumb breadcrumb-menubar">
                            <li> <a href="{{route('index')}}"> Home </a> SHOP  </li>
                        </ol>
                    </div>
                </div>
            </section>
            <!--Breadcrumb Section End-->


            <!-- Shop Starts-->
            <section class="shop-wrap sec-space-bottom">
                <div class="pattern">
                    <img alt="" src="assets/img/icons/white-pattern.png">
                </div>

                <div class="container rel-div">
                    <div class="row sort-bar">
                        <div class="icon"> <img alt="" src="assets/img/logo/logo-2.png" /> </div>
                        <div class="row" style="margin-top:20px;width:100%;">
                        <div class="col-sm-2" style="padding-top:20px;">
                            <div class="sort-dropdown left" >
                                <span style="font-size:16px;padding-left: 10px;">CATEGORY</span>
                            </div>
                        </div>
                            <div class="col-sm-10 text-center">
                                <div class="tabs-box">
                                    <ul class="theme-tabs small">
                                        <?php $count=0; ?>
                                            <li <?php if($count==0){ ?> class="active" <?php } ?>  ><a style="font-size:20px;font-weight:bold;padding:10px 20px 10px 20px;" href="cat-0" class="cat-tabs" data-toggle="tab"> All Items </a></li>
                                        @foreach($categories as $c)
                                            <li   ><a style="font-size:20px;font-weight:bold;padding:10px 20px 10px 20px;" href="cat-{{$c->id}}" class="cat-tabs" data-toggle="tab"> {{$c->name}} </a></li>
                                            <?php $count++; ?>
                                        @endforeach
                                    </ul>
                                </div>
{{--                                <div class="search-selectpicker selectpicker-wrapper">--}}
{{--                                    <select class="selectpicker"  data-width="100%"--}}
{{--                                            data-toggle="tooltip">--}}
{{--                                        <option value="0">All product</option>--}}
{{--                                        @foreach($categories as $c)--}}
{{--                                        <option value="{{$c->id}}">{{$c->name}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>

                    <div class="divider-full-1" style="display:block;margin:0px;"></div>

                    <div class="result-bar block-inline">
                        <h4 class="result-txt">Result Found </h4>
                    </div>

                    <div class="tab-content shop-content">
                        <div id="grid-view" class="tab-pane fade active in" role="tabpanel">
                            <div class="row product_div">
                            @foreach($products as $p)
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="product-box">
                                    <div class="product-media" style="height:200px;">
                                        <img class="prod-img" style="width:140px;height:160px;position:absolute;" alt="{{$p->picture}}" src="img/products/{{$p->picture}}">
                                        <img class="shape" alt="shap-small.png" src="img/icons/shap-small.png">
                                    </div>
                                    <div class="product-caption">
                                    <form action="/cart" method="POST" class="addtocart">
                                        {{csrf_field()}}
                                        <h3 class="product-title">
                                            <a> <span class="light-font"> {{$p->name}} </span></a>
                                        </h3>
                                        <div class="prod-btns fontbold-2" style="margin:0px auto;border-top:none;border-bottom:none;padding:0px 0px 10px 0px;">
                                        <div class="quantity" >
                                                <button class="btn minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" type="button"><i class="fa fa-minus-circle"></i></button>
                                                <input title="Qty" name="quantity" onKeyDown="return false" min="{{$p->quant_step}}" step="{{$p->quant_step}}" value="{{$p->quant_step}}" class="form-control qty" type="number">
                                                <button class="btn plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" type="button"><i class="fa fa-plus-circle"></i></button>
                                        </div>
                                        </div>
                                        <div class="price">
                                            <strong class="clr-txt">Pkr <span class="price-span">{{$p->price}}</span> </strong>
                                            <input type="hidden" name="id" value="{{$p->id}}">
                                            <input type="hidden" name="name" value="{{$p->name}}">
                                            <input type="hidden" class="priceinput" name="price" value="{{$p->price}}">
                                            <input type="hidden" name="orig_quant" value="{{$p->quant_step}}">
                                        </div>
                                        <button type="submit" style="margin-top:10px;" class="theme-btn btn"> <strong> ADD TO CART </strong> </button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            </div>

                        </div>

                    </div>
                </div>
            </section>
            <!-- / Shop Ends -->
            @include('partials.footer')
            <!-- / CONTENT AREA -->

            <div id="to-top-mb" class="to-top mb"> <i class="fa fa-arrow-circle-o-up"></i> </div>
            <div style="position:fixed;z-index:2;bottom:0;right:0;margin-right:20px;">
                <div class="alert alert-success" id="success-alert">
                </div>
            </div>
        </main>
        <!-- /WRAPPER -->
<div class="modal fadeIn" id="limitModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="">
            <div class="modal-header" style="border-bottom: 0px;padding:5px;">
                {{--                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="padding:10px;background:white;">--}}
                {{--                    <span aria-hidden="true">&times;</span>--}}
                {{--                </button>--}}
            </div>
            <div class="modal-body text-center" style="background-image: url("img/extra/sec-img-6.png");">
            <h4>Limit Reached</h4>
            <p>Dear Customer we have reached our daily order limit, you can try placing your order tomorrow.</p>
        </div>
        {{--            <div class="modal-footer" style="border-top:0px;padding:40px;">--}}
        {{--            </div>--}}
    </div>
</div>
</div>


    @include('partials.js')
    <script>
       $(document).ready(function(){

           $("#success-alert").hide();

           @if($limit[0]->total>=$setting->setting_value)
           $("#limitModal").modal('show');
           @endif

         //update price in item card with buttons
       $(document).on('click','.plus , .minus',function(){
           var qty=$(this).siblings(".qty").val();
           var orig_price=$(this).parent().parent().parent().find('.price').children('.priceinput').val();
           orig_price=Number(orig_price);
           var new_price=orig_price;
           var orig_qty=$(this).siblings(".qty").attr("min");
           orig_qty=Number(orig_qty);
           var loop_qty=orig_qty;

           while(loop_qty!=qty)
           {
               new_price=new_price+orig_price;
               loop_qty=loop_qty+orig_qty;
           }
           $(this).parent().parent().parent().find('.price').children('.clr-txt').children('.price-span').html(new_price);
       });


        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

       $(document).on('click','[class="cat-tabs"]',function(){
        var id = $(this).attr('href').match(/\d+/);
        var url = "{{ route('filterlist') }}";

        $.ajax({
           type:'POST',
           url: url,
           data:{ 'id' : id},
           success:function(data){
                 $('.product_div').html(data);

             }
         });

	  });

           $(document).on('submit','.addtocart',function(e){
               e.preventDefault();
               // alert($(this).html());
               var customurl = "{{ route('store') }}";
               $.ajax({
                   type:'POST',
                   url: customurl,
                   data: $(this).serialize(),
                   success:function(data){
                       $('.cart-items').html('<a href="{{route('cart')}}"> <img alt="cart-icon.png" src="{{ asset('/img/icons/cart-icon.png')}}" /> </a> <span class="cnt crl-bg "> '+data+' </span>');
                       $("#success-alert").html('Item Added to Cart.');
                       $("#success-alert").fadeTo(2000, 500).slideUp(500, function () {
                           $("#success-alert").slideUp(500);
                       });
                   }
               });
           });



    });

       </script>

    </body>
</html>
