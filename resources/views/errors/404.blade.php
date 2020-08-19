<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.css')
</head>

<body id="home" class="wide">

<!-- WRAPPER -->
<main class="wrapper">
    <!-- CONTENT AREA -->

    <!-- Main Header Start -->
    @include('partials.header')
    <!-- / Main Header Ends -->

    <!--Breadcrumb Section Start-->
    <section class="breadcrumb-bg">
        <div class="theme-container container ">
            <div class="site-breadcumb white-clr">
                <h2 class="section-title"> <strong class="clr-txt">naturix </strong> <span class="light-font">farmfood </span> </h2>
                <ol class="breadcrumb breadcrumb-menubar">
                    <li> <a href="{{route('index')}}"> Home </a> 404  </li>
                </ol>
            </div>
        </div>
    </section>
    <!--Breadcrumb Section End-->

    <!-- Error Starts-->
    <section class="error-wrap sec-space text-center">
        <div class="container">
            <img src="img/icons/error.png" alt=""/>
            <h2 class="section-title pt-15"> <span class="light-font">error - </span> <strong>not found </strong> </h2>
            <p class="fsz-16 ptb-15">It seems we can’t find what you’re looking for. Perhaps searching can help or go back to <a href="{{route('index')}}" class="clr-txt-2"> Homepage. </a> </p>

        </div>
    </section>
    <!-- / Error Ends -->

    <!-- / CONTENT AREA -->

    <!-- FOOTER -->
    @include('partials.footer')
    <!-- /FOOTER -->

    <div id="to-top-mb" class="to-top mb"> <i class="fa fa-arrow-circle-o-up"></i> </div>

</main>
<!-- /WRAPPER -->
@include('partials.js')

</body>
</html>
