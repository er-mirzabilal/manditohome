<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   @include('partials.css')
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
    <!--====== HEADER PART START ======-->

    @include('partials.header')

    <!--====== HEADER PART ENDS ======-->

    <!--====== PAGE BANNER PART START ======-->

    <!--Breadcrumb Section Start-->
    <section class="breadcrumb-bg">
        <div class="theme-container container ">
            <div class="site-breadcumb white-clr">
                <h2 class="section-title"> <strong class="clr-txt">naturix </strong> <span class="light-font">Shop </span> </h2>
                <ol class="breadcrumb breadcrumb-menubar">
                    <li> <a href="{{route('index')}}"> Home </a> Checkout  </li>
                </ol>
            </div>
        </div>
    </section>

    <!--====== PAGE BANNER PART ENDS ======-->

    <!--====== CHECKOUT PART START ======-->

    @if(session()->has('success'))

    <div class="container" style="padding:40px 20px;text-align:center;">
    <h4 style="padding:10px;">{{ session()->get('success') }}</h4>
        <a href="{{route('index')}}"><button class="slide-btn"><i class="fa fa-arrow-left fa-sm fa-fw"></i> Homepage</button></a>
    </div>

    @else
        <section class="account-page ptb-50">
            <div class="container">
                <form action="/checkout" method="POST" id="checkout_form">
                <div class="row">
                    {{ csrf_field() }}
                    <aside class="col-md-6 col-sm-7 ptb-15">
                        <div class="container-fluid" style="padding:15px;background:#7fba00;font-weight:700;color:white;">Buyer Info: <span style="float:right;"> * Required Field</span></div>
                        <div class="account-wrap cart-box">
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label> * Customer Name </label>
                                        @auth
                                        <input type="text" name="name" value="{{Auth::user()->name}}" class="form-control" minlength="5" required placeholder="Enter your Full Name">
                                            @endauth
                                        @guest
                                            <input type="text" name="name" class="form-control" minlength="5" required placeholder="Enter your Full Name">
                                            @endguest
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label> * Mobile </label><span id="numerror" style="color:red;float:right;"></span>
                                        @auth
                                        <input type="text" name="number" value="{{Auth::user()->email}}" id="numinput" minlength="11" class="form-control" required placeholder="Enter your Contact number">
                                   @endauth
                                        @guest
                                            <input type="text" name="number" id="numinput" minlength="11" class="form-control" required placeholder="Enter your Contact number">
                                            @endguest
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label> * Address </label>
                                        @auth
                                        <input type="text" name="address" value="{{Auth::user()->address}}" class="form-control" minlength="5" required placeholder="Enter your Address">
                                            @endauth
                                        @guest
                                            <input type="text" name="address" class="form-control" minlength="5" required placeholder="Enter your Address">
                                            @endguest
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label> * Delivery Area </label>
                                        <select class="form-control deliverySelect">
                                            @foreach($areas as $a)
                                                <option value="{{$a->name}}-{{$a->shipping_price}}">{{$a->name}}</option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" name="deliveryFee" id="deliveryFee" >
                                        <input type="hidden" name="deliveryArea" id="deliveryArea">
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label> Comment about Order (Optional) </label>
                                        <textarea name="comment" class="form-control" placeholder="Enter your Comment"></textarea>
                                    </div>


                                </div>

                        </div>
                    </aside>

                    <!-- Sidebar Starts -->
                    <aside class="col-md-6 col-sm-5">
                        <div class="widget-wrap">
                            <h2 class="widget-title"> <span class="light-font">My</span> <strong>Cart</strong> <a href="{{route('cart')}}"><span style="float:right;font-size:18px;"><i class="fa fa-pencil"></i> Edit cart</span></a></h2>
                            <div class="divider-full-1"></div>

                            <div class="order-list" style="padding:0px;width:100%;height:320px;overflow-y: auto;overflow-x: hidden;">
                                @php $total=0;$count=1;@endphp
                                @foreach (Cart::content() as $item)
                                    <div class="row" style="padding:0px;">
                                        <div class="col-sm-3" style="">
{{--                                            <img src="img/products/{{$item->model->picture}}" style="width:80px;" alt="{{$item->model->picture}}">--}}
                                            <h5 style="margin-bottom:10px;">{{$item->name}}</h5>
                                        </div>
{{--                                        <span style="display:none;">--}}
                                        @php
                                                    $new_price=$item->price;
                                            $new_qty=$item->options->quant;
                                            while($new_qty!=$item->qty)
                                            {
                                                $new_price=$new_price+$item->price;
                                                $new_qty=$new_qty+$item->options->quant;
                                                $count++;
                                            }
                                            @endphp
{{--                                                </span>--}}
                                        <div class="col-sm-9" style="text-align:right;">

                                            <p style="margin-top:10px;margin-bottom:10px;">{{$item->options->quant}} x <span style="color:#2e4db9;">Pkr: {{$item->price}} = </span></p>
                                        </div>
                                    </div>

                                    <hr style="margin:0px;">
                                    <span style="display:none;">{{$total+=$new_price}}</span>
                                @endforeach

                            </div>
{{--                            <hr style="margin:0px;">--}}
                            <div class="row">
                                <div class="col-sm-8">

                                    @auth
                                        <div class="form-group col-sm-12" style="padding:0px;font-size:15px;">
                                            <img src="{{asset('/img/icons/loyalty-icon.png')}}" alt="no-image" style="width:30px;"/>
                                            <span>You will earn<strong> <span class="priceToLoyaltySpan"></span> </strong>loyalty points from this order.</span>
                                            <input type="hidden" name="priceToLoyaltyInput" id="priceToLoyaltyInput">
                                        </div>

                                        <div class="col-sm-12" style="padding-left: 0px;padding-top:10px;">
                                        <span> You have {{Auth::user()->loyalty_points}} loyalty points available => (@php
                                                $loyaltyToPrice=0;
                                              for($i=1;$i<=Auth::user()->loyalty_points;$i++)
                                                {
                                                 $loyaltyToPrice+=1;
                                                 //Auth::user()->loyalty_step;
                                                }
                                                echo 'Pkr: '.$loyaltyToPrice;
                                            @endphp)</span></br>
                                            <div class="form-group col-sm-4" style="padding:0px;padding-top:10px;">
                                                <input type="number" min="1" class="form-control col-sm-2" max="@php echo Auth::user()->loyalty_points; @endphp" name="spendloyalty" id="spendloyalty">
                                            </div>
                                            <div class="form-group col-sm-8" style="padding-top:10px;">
                                                <h5>Use Loyalty Points</h5>
                                            </div>

                                        </div>
                                    @endauth
                                </div>
                                <div class="col-sm-4" style="text-align:right;">
                                    <div class="order-total" >
                                        <h4>Subtotal = <span style="color:#7fba00;">Pkr: @php echo $total; @endphp </h4>
                                        <input type="hidden" name="totalprice" id="totalprice" value="@php echo $total; @endphp">
                                        <h4>Shipping = <span style="color:#7fba00;" class="shipping-cost"></span></h4>
                                        @if(isset($discount))
                                        <h4>Discount = <span style="color:#7fba00;" class="discount-span">{{$discount->setting_value}}%</span></h4>
                                            @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12" style="padding-right: 0px;padding-left:0px;padding-top:10px;">
                                @if(Cart::content()->count()>0)
                                    <button type="submit"  style="float:left" class="theme-btn btn-black"> <b> Place Order </b> </button>
                                @endif
                                <h4 style="float:right;border-top:1px solid #ccc;">Order Total = <span class="total-span" style="color:#7fba00;"></span></h4>
                            </div>


                        </div>
                    </aside>
                    <!-- Sidebar Ends -->

                </div>
                </form>
            </div>
        </section>
        @endif

    <!--====== CHECKOUT PART ENDS ======-->

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

    <!--====== FOOTER PART START ======-->

    @include('partials.footer')

    <!--====== FOOTER PART ENDS ======-->

    <!--====== BACK TO TOP PART START ======-->

    <div id="to-top-mb" class="to-top mb"> <i class="fa fa-arrow-circle-o-up"></i> </div>

    <!--====== BACK TO TOP PART ENDS ======-->

    @include('partials.js')
    <script>
       $(document).ready(function(){

           @if($limit[0]->total>=$setting->setting_value)
           $("#limitModal").modal('show');
           @endif

           $(".deliverySelect > option").each(function() {
               var array=$(this).val().split("-");
               if(array[0]==localStorage.getItem('selectedArea'))
               {
                   $(this).prop('selected',true);
               }
               $("#deliveryArea").val(localStorage.getItem('selectedArea'));
               $("#deliveryFee").val(localStorage.getItem('selectedAreaFee'));
               $(".shipping-cost").html(localStorage.getItem('selectedAreaFee'));


           });

           calculateTotal();
           function calculateTotal() {
               var total = 0;
               var subtotal = parseInt($("#totalprice").val());
               var shipping = parseInt($("#deliveryFee").val());
                   <?php
                   if(isset($discount))
                   { ?>
               var discount = parseInt('<?php echo $discount->setting_value;?>');
               discount=subtotal * discount/100;
               total = (subtotal + shipping) - parseInt(discount);
               <?php  }
                   else
                   { ?>
                   total = subtotal + shipping;
               <?php  }
               ?>
               $('.total-span').html('Pkr: '+total);
               $("#totalprice").val(total-shipping);
           }

               @auth

           var total=parseInt($("#totalprice").val());
           //var shipping=parseInt(localStorage.getItem('selectedAreaFee'));
           var points=0;
           var step=100;
           for(var i=0;i<total;i=i+step)
           {
               points++;
           }
           $(".priceToLoyaltySpan").html(points);
           $("#priceToLoyaltyInput").val(points);

           @endauth

           $(".deliverySelect").on('change',function(){
             var array=$(this).val().split("-");
               $("#deliveryArea").val(array[0]);
               $("#deliveryFee").val(parseInt(array[1]));
               $(".shipping-cost").html(parseInt(array[1]));
               localStorage.setItem('selectedArea', array[0]);
               localStorage.setItem('selectedAreaFee', parseInt(array[1]));
               calculateTotal();
{{--               @auth--}}
{{--               var total=parseInt($("#totalprice").val());--}}
{{--               //var shipping=parseInt(array[1]);--}}
{{--               var points=0;--}}
{{--               var step=parseInt('<?php echo Auth::user()->loyalty_step;?>');--}}
{{--               for(var i=0;i<total;i=i+step)--}}
{{--               {--}}
{{--                   points++;--}}
{{--               }--}}
{{--               $(".priceToLoyaltySpan").html(points);--}}
{{--               @endauth--}}
           });



        $("#checkout_form").on('submit',function(e){
        e.preventDefault();
        var val=$("#numinput").val();
        if(/^\d+$/.test(val))
        {
        this.submit();
        }
        else
        {
        $("#numerror").html('Please enter only Numbers');
        }
        });
       });

    </script>



</body>

</html>
