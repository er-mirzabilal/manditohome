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
                <li> <a href="{{route('index')}}"> Home </a> Register  </li>
            </ol>
        </div>
    </div>
</section>

<section class="account-page ptb-50">
    <div class="container">
        <div class="col-sm-6 ptb-15 my-sm-auto" style="margin:0px auto;float:none;">
            <div class="container-fluid" style="padding:15px;background:#7fba00;font-weight:700;color:white;">Register Form:</div>
            <div class="account-wrap cart-box">
                <form class="gray-control" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label> * Name : </label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-12">
                          <label> * Phone Number : </label>
                          <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                          @error('phone')
                          <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                          @enderror
                      </div>
                        <div class="form-group col-sm-12">
                            <label> * Email Address : </label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-12">
                            <label> * Password : </label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-12">
                            <label> * Confirm Password : </label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <div class="form-group col-sm-12">
                            <label> * Address : </label>
                            <input id="address" type="text" class="form-control" name="address" required autocomplete="address">
                        </div>
                        <div class="pt-15 col-sm-12">
                            <button type="submit" class="theme-btn btn-black"> <b> Login </b> </button><a href="{{route('login')}}"><span style="float:right;color:#7fba00;padding-top:15px;text-decoration:underline;">Have Account? Login</span></a>
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
