<!-- Main Header Start -->
 <div class="header-topbar" style="position:absolute;top:0;z-index:12;left:0;right:0;">
                <div class="container-fluid">
                    <div class="left">
                        <ul class="top-nav">
                            <li>
                                <span>Email : </span> <a >manditohome@gmail.com </a>
                            </li>
                            <li> Phone : +923095566088 </li>
                        </ul>
                    </div>
                    <div class="right">
                        <ul class="top-nav">
                            <li class="social-icon">
                                <a href="#" class="fa fa-facebook"></a>
                                <a href="#" class="fa fa-twitter"></a>
                                <a href="#" class="fa fa-google-plus"></a>
                                <a href="#" class="fa fa-instagram"></a>
                                <a href="#" class="fa fa-behance"></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <header class="main-header white-bg " style="padding-bottom:10px;">
                <div class="container-fluid rel-div">
                    <div class="col-lg-4 col-sm-8">
                        <div class="main-logo">
                            <a href="{{route('index')}}"> <img alt="" src="{{ asset('/img/logo/main-logo.png')}}" />  </a>
                            <span class="medium-font">ORGANIC STORE</span>
                        </div>
                    </div>

                    <div class="col-lg-7 responsive-menu">
                        <div class="responsive-toggle fa fa-bars"> </div>
                        <nav class="fix-navbar" id="primary-navigation">
                            <ul class="primary-navbar">
                                <li class="">
                                    <a href="{{route('index')}}" >Home</a>
                                </li>
                                <li><a href="{{route('product')}}">Shop</a></li>
                                <li><a href="{{route('contact')}}">Contact Us</a></li>


                            @guest
                                    <li><a href="{{route('login')}}"><i class="fa fa-sign-in fa-sm fa-fw"></i> Login</a></li>
                                    <li><a href="{{route('register')}}"><i class="fa fa-user-plus fa-sm fa-fw"></i> SignUp</a></li>
{{--                                <li style="margin-top:0px;">--}}
{{--                                    <a href="{{route('login')}}"><button class="slide-btn"><i class="fa fa-sign-in fa-sm fa-fw"></i> Login</button></a>--}}
{{--                                </li>--}}
                            @else
                                        <li class="dropdown">
                                            <a style="cursor:pointer;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" ><span>{{ Auth::user()->name }}
                                            <img class="img-profile rounded-circle" style="width:35px;" src="{{ asset('/img/users/user.png')}}"></span></a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="{{route('customerhome')}}"> <i class="fa fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                                        Dashboard </a>
                                                </li>
                                                <li>
                                                    <a href="{{route('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                        <i class="fa fa-sign-out fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                                                    </a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                </li>
                                            </ul>
                                        </li>
                            @endguest
                            </ul>
                        </nav>
                    </div>

                    <div class="col-lg-1 col-sm-2 cart-megamenu">
                        <div class="cart-hover cart-items">
                            <a href="{{route('cart')}}"> <img alt="cart-icon.png" src="{{ asset('/img/icons/cart-icon.png')}}" /> </a>
                            @if(Cart::content()->count() > 0)
                                <span class="cnt crl-bg "> {{Cart::content()->count()}} </span>
                                @endif
                        </div>


                        <div class="responsive-toggle fa fa-bars"> </div>
                    </div>

                </div>
            </header>
