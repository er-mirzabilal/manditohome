<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.css')
</head>

<body id="home" class="wide">
@include('partials.header')

<!--====== HEADER PART ENDS ======-->
<!--====== PAGE BANNER PART START ======-->
<!--Breadcrumb Section Start-->
<section class="breadcrumb-bg">
    <div class="theme-container container ">
        <div class="site-breadcumb white-clr">
            <h2 class="section-title"> <strong class="clr-txt">naturix </strong> <span class="light-font">Shop </span> </h2>
            <ol class="breadcrumb breadcrumb-menubar">
                <li> <a href="{{route('index')}}"> Home </a> Login  </li>
            </ol>
        </div>
    </div>
</section>

<!--====== PAGE BANNER PART ENDS ======-->
<section class="account-page ptb-50">
    <div class="container">
            <div class="col-sm-6 ptb-15 my-sm-auto" style="margin:0px auto;float:none;">
                <div class="container-fluid" style="padding:15px;background:#7fba00;font-weight:700;color:white;">Login Form:</div>
                <div class="account-wrap cart-box">
                    <form class="gray-control" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label> * Mobile Number : </label>
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-12">
                                <label> * Password : </label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" style="transform: scale(1.0);" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <span>Remember Me</span>
                            </div>
                            </div>
                            <div class="pt-15 col-sm-12">
                                <button type="submit" class="theme-btn btn-black"> <b> Login </b> </button><a href="{{route('register')}}"><span style="float:right;color:#7fba00;padding-top:15px;text-decoration:underline;">New User? Register</span></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

    </div>
</section>

<!--====== FOOTER PART START ======-->

@include('partials.footer')

<!--====== FOOTER PART ENDS ======-->

<!--====== BACK TO TOP PART START ======-->

<div id="to-top-mb" class="to-top mb"> <i class="fa fa-arrow-circle-o-up"></i> </div>

<!--====== BACK TO TOP PART ENDS ======-->

@include('partials.js')
</body>
</html>
