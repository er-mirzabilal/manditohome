<footer class="page-footer">
                <section class="sec-space light-bg" style="padding-top:50px;padding-bottom: 50px;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-sm-12 footer-widget">
                                <div class="main-logo">
                                    <a href="{{route('index')}}"> <img alt="" src="{{ asset('/img/logo/main-logo.png')}}" />  </a>
                                    <span class="medium-font">ORGANIC STORE</span>
                                </div>
{{--                                <span class="divider-2"></span>--}}
{{--                                <div class="text-widget">--}}
{{--                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna.</p>--}}
{{--                                    <ul>--}}
{{--                                        <li> <i class="fa fa-map-marker"></i> <span> <strong>100 highland ave,</strong> california, united state </span> </li>--}}
{{--                                        <li> <i class="fa fa-envelope-square"></i> <span><a href="#">contact@naturix.com</a> </span> </li>--}}
{{--                                        <li> <i class="fa fa-phone-square"></i> <span><a href="#">www.naturix.com</a> </span> </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
                            </div>
                            <div class="col-md-4 col-sm-4 footer-widget " style="text-align:center;">
                                <div style="display: inline-block; text-align: left;">
                                    <p class="fsz-16"><i class="fa fa-envelope-square"></i> <span><a >manditohome@gmail.com</a> </span></p>
{{--                                <h2 class="title-1">  <span class="light-font">naturix  </span> <strong>information </strong> </h2>--}}
{{--                                <span class="divider-2"></span>--}}
{{--                                <ul class="list">--}}
{{--                                    <li> <a href="{{route('index')}}"> Home </a> </li>--}}
{{--                                    <li> <a href="{{route('product')}}"> Shop </a> </li>--}}
{{--                                    <li> <a href="{{route('contact')}}"> Contact Us </a> </li>--}}
{{--                                    <li> <a href="{{route('login')}}"> Login </a> </li>--}}
{{--                                    <li> <a href="{{route('register')}}"> Signup </a> </li>--}}
{{--                                </ul>--}}
                                </div>
                            </div>
                            @auth
                            <div class="col-md-4 col-sm-4 footer-widget" style="text-align: center;">
                                <div style="display: inline-block; text-align: left;">
                                    <p class="fsz-16"><i class="fa fa-phone-square"></i> <span><a >+923095566088</a> </span></p>
{{--                                <h2 class="title-1">  <span class="light-font">my  </span> <strong>account </strong> </h2>--}}
{{--                                <span class="divider-2"></span>--}}
{{--                                <ul class="list">--}}
{{--                                    <li> <a href="{{route('customerhome')}}"> my account </a> </li>--}}
{{--                                </ul>--}}
                                </div>
                            </div>
                            @endauth
                        </div>
                    </div>
                </section>
                <section class="footer-bottom">
                    <div class="pattern">
                        <img alt="" src="{{ asset('/img/icons/white-pattern.png')}}">
                    </div>
                    <div id="to-top" class="to-top"> <i class="fa fa-arrow-circle-o-up"></i> </div>
                    <div class="container ptb-30">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 text-center">
                                <p>©<script>document.write(new Date().getFullYear());</script> <a href="{{route('index')}}"> <strong> manditohome.com</strong> </a>, all right reserved</p>
                            </div>
{{--                            <div class="col-md-6 col-sm-7">--}}
{{--                                <ul class="primary-navbar footer-menu">--}}
{{--                                    <li> <a href="{{route('contact')}}">Contact Us </a> </li>--}}
{{--                                    <li> <a href="{{route('login')}}">Login  </a> </li>--}}
{{--                                    <li> <a href="{{route('register')}}">Register  </a> </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </section>
            </footer>
