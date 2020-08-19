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
        <main class="wrapper home-wrap">
            <!-- CONTENT AREA -->

            <!-- Main Header Start -->
            @include('partials.header')
            <!-- / Main Header Ends -->

            <!-- Main Slider Start -->
            <section class="main-slide">
                <div id="naturix-slider" class="owl-carousel nav-1">
                    <div class="item">
                        <img alt=".." src="img/slider/slide-2.jpg" />
                        <div class="tbl-wrp slide-2">
                            <div class="text-middle">
                                <div class="tbl-cell">
                                    <div class="slide-caption container text-center">
                                        <div class="slide-title2 pb-50">
                                            <h2 class="section-title"> <strong>organic <img src="img/icons/logo-icon-big.png"> </strong> <span class="light-font">food</span> </h2>
                                            <h4 class="sub-title"> ORGANIC FRUITS, VEGETABLES, AND LOT MORE TO YOUR DOOR </h4>
                                        </div>
                                        <div class="slide">
                                            <a href="{{route('product')}}" class="slide-btn"> Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <img alt=".." src="img/slider/slide-5.jpg" />
                        <div class="tbl-wrp slide-2">
                            <div class="text-middle">
                                <div class="tbl-cell">
                                    <div class="slide-caption container text-center">
                                        <div class="slide-title2 pb-50">
                                            <h2 class="section-title"> <strong>organic <img src="img/icons/logo-icon-big.png"> </strong> <span class="light-font">food</span> </h2>
                                            <h4 class="sub-title"> ORGANIC FRUITS, VEGETABLES, AND LOT MORE TO YOUR DOOR </h4>
                                        </div>
                                        <div class="slide">
                                            <a href="{{route('product')}}" class="slide-btn"> Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- / Main Slider Ends -->


            <!-- Naturix Goods Starts-->
            <section class="naturix-goods sec-space ">
                <div class="container">
                    <div class="title-wrap">
                        <h4 class="sub-title"> FRESH FROM OUR FARM </h4>
                        <h2 class="section-title"> <span class="light-font">naturix </span> <strong> organic goods <img src="img/icons/logo-icon.png" alt="" /></strong> </h2>
                    </div>

                    <div class="tabs-box text-center">
                        <ul class="theme-tabs small">
                        <?php $count=0; ?>
                        @foreach($categories as $c)
                        <li <?php if($count==0){ ?> class="active" <?php } ?>  ><a style="font-size:20px;font-weight:bold;padding:10px 20px 10px 20px;" href="cat-{{$c->id}}" class="cat-tabs" data-toggle="tab"> {{$c->name}} </a></li>
                        <?php $count++; ?>
                        @endforeach
                        </ul>
                    </div>
                    <div class="tab-content shop-content">

                    </div>
{{--                    <a href="{{route('product')}}"><button type="button" style="margin-top:10px;" class="theme-btn btn"> <strong> <i class="fa fa-arrow-right"></i> More </strong> </button></a>--}}

                    <div class="slide text-center">
                        <br>
                        <a href="{{route('product')}}" class="slide-btn"><i class="fa fa-arrow-right"></i> More</a>
                    </div>
                </div>
            </section>
            <!-- / Naturix Goods Ends -->

            <!-- Naturix Quality Starts-->
            <section class="naturix-quality sec-space-bottom ">
                <div class="pattern">
                    <img alt="" src="img/icons/white-pattern.png">
                </div>
                <div class="section-icon">
                    <img alt="" src="img/icons/icon-2.png">
                </div>
                <div class="container">
                    <div class="title-wrap pt-15">
                        <h2 class="section-title pt-15"> <span class="light-font">we are </span> <strong> organic farmfood <img src="img/icons/logo-icon-1.png"></strong> </h2>
                        <h4 class="sub-title"> FEATURES NATURIX FARMFOOD </h4>
                    </div>
                    <div class="food-quality block-inline">
                        <div class="col-md-4 pt-50">
                            <div class="left">
                                <div class="quality-img">
                                    <img alt="" src="img/icons/quality-1.png" />
                                </div>
                                <div class="quality-caption">
                                    <h2 class="title-1">Premium Quality</h2>
                                    <span class="divider-2"></span>
                                    <p>Lorem ipsum dolor sit amet, consectuer adipiscing elit, sed diam nonummy.</p>
                                </div>
                            </div>
                            <div class="left">
                                <div class="quality-img">
                                    <img alt="" src="img/icons/quality-2.png" />
                                </div>
                                <div class="quality-caption">
                                    <h2 class="title-1">Always Fresh</h2>
                                    <span class="divider-2"></span>
                                    <p>Lorem ipsum dolor sit amet, consectuer adipiscing elit, sed diam nonummy.</p>
                                </div>
                            </div>
                            <div class="left">
                                <div class="quality-img">
                                    <img alt="" src="img/icons/quality-3.png" />
                                </div>
                                <div class="quality-caption">
                                    <h2 class="title-1">100% Natural</h2>
                                    <span class="divider-2"></span>
                                    <p>Lorem ipsum dolor sit amet, consectuer adipiscing elit, sed diam nonummy.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <img alt="" src="img/extra/quality-1.png">
                        </div>
                        <div class="col-md-4 pt-50">
                            <div class="right">
                                <div class="quality-img">
                                    <img alt="" src="img/icons/quality-4.png" />
                                </div>
                                <div class="quality-caption">
                                    <h2 class="title-1">100% Organic Guarantee</h2>
                                    <span class="divider-2"></span>
                                    <p>Lorem ipsum dolor sit amet, consectuer adipiscing elit, sed diam nonummy.</p>
                                </div>
                            </div>
                            <div class="right">
                                <div class="quality-img">
                                    <img alt="" src="img/icons/quality-5.png" />
                                </div>
                                <div class="quality-caption">
                                    <h2 class="title-1">Super Healthy</h2>
                                    <span class="divider-2"></span>
                                    <p>Lorem ipsum dolor sit amet, consectuer adipiscing elit, sed diam nonummy.</p>
                                </div>
                            </div>
                            <div class="right">
                                <div class="quality-img">
                                    <img alt="" src="img/icons/quality-6.png" />
                                </div>
                                <div class="quality-caption">
                                    <h2 class="title-1">Best Quality</h2>
                                    <span class="divider-2"></span>
                                    <p>Lorem ipsum dolor sit amet, consectuer adipiscing elit, sed diam nonummy.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Naturix Quality Starts-->

            <div class="container"> <div class="divider-full-1"></div> </div>

            <!-- Subscribe Newsletter Starts-->
            <section class="subscribe-wrap sec-space light-bg">
                <img alt="" src="img/extra/sec-img-5.png" class="right-bg-img" />
                <img alt="" src="img/extra/sec-img-6.png" class="left-bg-img" />
                <div class="container">
                    <div class="testimonials">
                        <div id="testimonial-slider" class="testimonial-slider nav-1">
                            <div class="item">
                                <div class="testi-wrap">
                                    <div class="testi-img">
                                        <a href="#"> <img src="img/extra/testi-1.jpg" alt="" /> </a>
                                    </div>
                                    <div class="testi-caption">
                                        <p> <i>“Lorem ipsum dolor sit amet, consectetuer adipiscing elitsed the diam nonummy nibh euismod tincidunt.”</i> </p>
                                        <a href="#"> <i class="fa fa-user clr-txt"></i> <strong> LUIS GARCHIA </strong> </a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testi-wrap">
                                    <div class="testi-img">
                                        <a href="#"> <img src="img/extra/testi-1.jpg" alt="" /> </a>
                                    </div>
                                    <div class="testi-caption">
                                        <p> <i>“Lorem ipsum dolor sit amet, consectetuer adipiscing elitsed the diam nonummy nibh euismod tincidunt.”</i> </p>
                                        <a href="#"> <i class="fa fa-user clr-txt"></i> <strong> LUIS GARCHIA </strong> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Subscribe Newsletter Ends -->



            <!-- / CONTENT AREA -->

            <!-- FOOTER -->
            @include('partials.footer')
            <!-- /FOOTER -->

            <div id="to-top-mb" class="to-top mb"><i class="fa fa-arrow-circle-o-up"></i></div>
            <div style="position:fixed;z-index:2;bottom:0;right:0;margin-right:20px;">
                <div class="alert alert-success" id="success-alert">
                </div>
            </div>
        </main>
        <!-- /WRAPPER -->


<div class="modal fadeIn areaModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="">
            <div class="modal-header" style="border-bottom: 0px;padding:5px;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="padding:10px;background:white;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <h4>Areas we Deliver</h4>
                <p>We are currently providing services in following areas</p>
                <select class="form-control area_select">
                    @foreach($areas as $a)
                        <option value="{{$a->name}}-{{$a->shipping_price}}">{{$a->name}}</option>
                        @endforeach
                </select>
            </div>
            <div class="modal-footer" style="border-top:0px;padding:40px;">

{{--                <button type="button" class="btn btn-primary">Save changes</button>--}}
{{--                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
            </div>
        </div>
    </div>
</div>

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

        <!-- Subscribe Popup-Dark -->
{{--        <section id="subscribe-popups" class="subscribe-me popups-wrap">--}}
{{--            <div class="modal-content">--}}
{{--                <button type="button" class="sb-close-btn close popup-cls"> <i class="fa-times fa clr-txt"></i> </button>--}}
{{--                <div class="subscribe-wrap">--}}
{{--                    <div class="main-logo">--}}
{{--                        <a href="index.html"> <img alt="" src="img/logo/main-logo.png" />  </a>--}}
{{--                    </div>--}}

{{--                    <div class="title-wrap">--}}
{{--                        <h2 class="section-title"> <strong>Select Your Area Below</strong> </h2>--}}
{{--                        <h4 class="fsz-12"> We are providing services in following areas </h4>--}}
{{--                    </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <select class="form-control" class="area_select">--}}
{{--                                @foreach($areas as $a)--}}
{{--                                <option value="{{$a->name}}">{{$a->name}}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <button class="theme-btn upper-text " type="button" data-dismiss="modal"> <strong> Ok </strong> </button>--}}
{{--                        </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}
        <!-- / Subscribe Popup-Dark -->

       @include('partials.js')
       <script>
       $(document).ready(function(){

           $("#success-alert").hide();

           @if($limit[0]->total>=$setting->setting_value)
           $("#limitModal").modal('show');
           @else
           $(".areaModal").modal('show');
           @endif

           $(".area_select").on('change',function(){
             var array=$(".area_select").val().split("-");
             var area=array[0];
             var fee=parseInt(array[1]);
             localStorage.setItem('selectedArea', area);
             localStorage.setItem('selectedAreaFee', fee);
             $(".areaModal").modal('toggle');
           });
           $(".areaModal").on('hidden.bs.modal', function(){
               var array=$(".area_select").val().split("-");
               var area=array[0];
               var fee=parseInt(array[1]);
               localStorage.setItem('selectedArea', area);
               localStorage.setItem('selectedAreaFee', fee);
           });

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

        var catid = $(".theme-tabs li.active a").attr('href').match(/\d+/);
        var customurl = "{{ route('getproductindex') }}";
           $.ajax({
               type:'POST',
               url: customurl,
               data: {'id' : catid},
               success:function(data){
                   $('.tab-content').html(data);
               }
           });


        $(document).on('click','[class="cat-tabs"]',function(){
        var id = $(this).attr('href').match(/\d+/);
        var url = "{{ route('getproductindex') }}";

        $.ajax({
           type:'POST',
           url: url,
            data: { 'id' : id},
           success:function(data){
                 $('.tab-content').html(data);

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
