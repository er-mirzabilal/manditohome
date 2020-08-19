<!DOCTYPE html>
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
                            <li> <a href="{{route('index')}}"> Home </a> Shopping Cart  </li>
                        </ol>
                    </div>
                </div>
            </section>
            <!--Breadcrumb Section End-->

            @if(Cart::count() > 0)
            <!-- Cart Starts-->
            <section class="shop-wrap sec-space">
                <div class="container">

                    <!-- Shopping Cart Starts -->
                    <div class="cart-table">
                        @if(session()->has('success'))
                            <div class="alert alert-success" id="success-alert">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                            <table class="product-table">
                                <thead class="">
                                    <tr>
                                        <th>product detail</th>
{{--                                        <th></th>--}}
                                        <th>Unit price</th>
                                        <th>quantity</th>
                                        <th>total price</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php $total=0; @endphp

                                @foreach (Cart::content() as $item)
                                    <tr>
{{--                                        <td class="image" style="padding:0px;">--}}
{{--                                            <div class="white-bg">--}}
{{--                                                <a class="media-link"><img style="width:70px;" src="img/products/{{$item->model->picture}}" alt="{{$item->model->picture}}"></a>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
                                        <td class="description fsz-16" style="padding:0px;text-align: center">
                                            <h3 class="product-title no-margin"> <a > <span class="light-font">{{$item->name}}</span></a> </h3>
                                        </td>
                                        <td style="padding:0px;">
                                            <div class="price fontbold-2">
                                                <strong class="fsz-16">Pkr {{$item->price}} </strong>
                                            </div>
                                        </td>
                                        <td style="padding:0px;">

                                            <div class="prod-btns fontbold-2" style="margin:10px auto;padding:0px;">

                                                <div class="quantity">
                                                    <input type="hidden" name="hiddenid" value="{{$item->rowId}}" class="hiddenid">
                                                    <button class="btn minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" type="button"><i class="fa fa-minus-circle"></i></button>
                                                    <input title="Qty" name="quantity" onKeyDown="return false" min="{{$item->options->quant}}" step="{{$item->options->quant}}" value="{{$item->qty}}" class="form-control qty" type="number">
                                                    <button class="btn plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" type="button"><i class="fa fa-plus-circle"></i></button>

                                                </div>

                                            </div>
                                        </td>
                                        <td style="padding:0px;">
                                            <span style="display:none;">
                                                    {{$new_price=$item->price}}
                                                {{$new_qty=$item->options->quant}}
                                                @while($new_qty!=$item->qty)
                                                    {{$new_price=$new_price+$item->price}}
                                                    {{$new_qty=$new_qty+$item->options->quant}}
                                                @endwhile
                                                </span>
                                            <strong class="clr-txt fsz-16 fontbold-2">Pkr {{$new_price}}</strong>
                                            </td>
                                            <td style="padding:0px;">
                                                <form action="{{route('delete', $item->rowId)}}" method="POST" style="display:inline-block;">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button class="" style="padding:0px;background:none;border:0px;" type="submit"><i class="remove fa fa-close clr-txt" ></i></button>
                                                </form>

                                            </td>
                                        </tr>
                                        <span style="display:none;">{{$total+=$new_price}}</span>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="continue-shopping" style="padding:0px;margin-bottom:20px;">

                                    <div class="right" style="padding:15px 0px;margin:0px;"> <strong class="fsz-20 fontbold-2">Subtotal : <span class="clr-txt"><Pkr></Pkr> @php echo $total; @endphp </span> </strong> </div>
                            </div>

                            <div class="shp-btn col-sm-12 text-center">
                                <a href="{{route('product')}}"><button class="theme-btn-2 btn"> <b> CONTINUE SHOPPING </b> </button></a>
                                <a href="{{route('checkout')}}"><button class="theme-btn-3 btn"> <b> CHECKOUT NOW </b> </button></a>
                            </div>

                    </div>
                    <!-- / Shopping Cart Ends -->
                </div>
            </section>
            <!-- / Cart Ends -->
            @else
            <div class="container" style="padding:20px;text-align:center;">
            <h3 style="padding:10px;">Your Cart is empty.</h3>
            <div class="shp-btn col-sm-12 text-center">
            <a href="{{route('product')}}"><button class="theme-btn-2 btn"> <b><i class="fa fa-arrow-left"></i> CONTINUE SHOPPING </b> </button></a>
            </div>
            </div>
            @endif

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

            <!-- / CONTENT AREA -->
           @include('partials.footer')

            <div id="to-top-mb" class="to-top mb"> <i class="fa fa-arrow-circle-o-up"></i> </div>

        </main>
        <!-- /WRAPPER -->
    @include('partials.js')
    <script>
        $(document).ready(function() {

            @if($limit[0]->total>=$setting->setting_value)
            $("#limitModal").modal('show');
            @endif

            $("#success-alert").fadeTo(2000, 500).slideUp(500, function () {
                $("#success-alert").slideUp(500);
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click','.plus , .minus',function(){
                var $this = $(this);
                var qty = $(this).parent().find('.qty').val();
                var id = $(this).parent().find('.hiddenid').val();
                var url = "{{ route('update','id') }}";
                url = url.replace('id', id);
                $.ajax({
                    type:'POST',
                    url: url,
                    data:{id:id, qty:qty},
                    success:function(data){
                         $('.cart-table').html(data);
                    }
                });

            });

        });
    </script>
    </body>

</html>
