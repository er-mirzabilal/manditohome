<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
   @include('partials.css')
</head>

<body id="home" class="wide">

<!-- WRAPPER -->
<main class="wrapper">
    <!-- CONTENT AREA -->

    <!--====== HEADER PART START ======-->
    @include('partials.header')

    <!--====== HEADER PART ENDS ======-->

    <!--Breadcrumb Section Start-->
    <section class="breadcrumb-bg">
        <div class="theme-container container ">
            <div class="site-breadcumb white-clr">
                <h2 class="section-title"> <strong class="clr-txt">naturix </strong> <span class="light-font">Shop </span> </h2>
                <ol class="breadcrumb breadcrumb-menubar">
                    <li> <a href="{{route('index')}}"> Home </a> Contact  </li>
                </ol>
            </div>
        </div>
    </section>
    <!--Breadcrumb Section End-->


    <!-- Shop Starts-->
    <section class="contact-wrap sec-space-bottom">
        <div class="container rel-div pt-50">

            <div class="row">
                <div class="col-md-8">
                    <h3 class="fsz-25 text-center"><span class="light-font">Contact </span> <strong>naturix </strong>  </h3>
                    <h6 class="sub-title-1 text-center">ORGANIC STORE</h6>

                    <div class="contact-form pt-50">
                        <form class="contact-form row" id="contact-form">
                            <div class="form-group col-sm-4">
                                <input class="form-control" placeholder="Name" name="Name" id="Name" required="" type="text">
                            </div>
                            <div class="form-group col-sm-4">
                                <input class="form-control" placeholder="Email" name="Email" id="Email" required="" type="email">
                            </div>
                            <div class="form-group col-sm-4">
                                <input class="form-control" placeholder="Phone" name="Phone" id="Phone" type="text">
                            </div>
                            <div class="form-group col-sm-12">
                                <textarea class="form-control"  placeholder="Message" name="Message" id="Message" cols="12" rows="3"></textarea>
                            </div>
                            <div class="form-group col-sm-12 text-center pt-15">
                                <button class="theme-btn" disabled type="submit"> <strong> SEND EMAIL </strong> </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-details">
                        <h3 class="fsz-25"><span class="light-font">Naturix  </span> <strong>Address </strong>  </h3>
                        <h6 class="sub-title-1 pb-15">ORGANIC STORE</h6>

                        <h5 class="clr-txt fsz-12 pt-15">NATURIX STORE</h5>
                        <p>142 West newton, NY 19088, United States</p>

                        <ul>
                            <li> <strong>Call:  </strong> <i>+7 (100) 2234 999</i> </li>
                            <li> <strong>Email: </strong> <i> <a href='#'>info@montero.com</a> </i> </li>
                            <li> <strong>Skype: </strong> <i> <a href='#'> Montero.Property </a> </i> </li>
                            <li> <strong>Facebook: </strong> <i>  <a href='#'> Montero.facebook </a> </i> </li>
                            <li> <strong>Twitter: </strong> <i>  <a href='#'> @Montero.Property </a> </i> </li>
                        </ul>

                    </div>
                </div>
            </div>



        </div>
    </section>
    <!-- / Shop Ends -->

    <!-- / CONTENT AREA -->

    <!--====== FOOTER PART START ======-->

    @include('partials.footer')

    <!--====== FOOTER PART ENDS ======-->

    <!--====== BACK TO TOP PART START ======-->

    <div id="to-top-mb" class="to-top mb"> <i class="fa fa-arrow-circle-o-up"></i> </div>
    </main>
    <!-- /WRAPPER -->

    <!--====== BACK TO TOP PART ENDS ======-->
    @include('partials.js')

</body>

</html>
