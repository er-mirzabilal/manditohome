<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
   @include('partials.css')
</head>
<body>
   
    <!--====== PREALOADER PART START ======-->
    
    <div class="preloader">
        <div class="thecube">
			<div class="cube c1"></div>
			<div class="cube c2"></div>
			<div class="cube c4"></div>
			<div class="cube c3"></div>
        </div>
    </div>
    
    <!--====== PREALOADER PART START ======-->
   
    <!--====== HEADER PART START ======-->
    
    @include('partials.header')
    
    <!--====== HEADER PART ENDS ======-->
   
    <!--====== PAGE BANNER PART START ======-->
    
    <section id="page-banner" class="pt-200 pb-150 bg_cover" style="background-image: url(images/page-banner.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-content">
                        <h3>Faq page</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!--====== PAGE BANNER PART ENDS ======-->
   
    <!--====== FAQ PAGE PART START ======-->
    
    <section id="faq-page" class="pt-60">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center">
                        <h2>Our Faq Page</h2>
                        <ul>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <p>Nunc molestie mi nunc, nec accumsan libero dignissim sit amet. Fusce sit amet tincidunt metus. Nunc eu risus  suscipit massa dapibus blandit. Vivamus ac commodo eros.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="faq-page-content pt-45">
                        <div class="accordion" id="accordionExample">
                           
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5>
                                        <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <span>Why do we use it ? Where can I get some ?</span>
                                        </a>
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h5>
                                        <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            <span>Where can I get some ?</span>
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body">
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h5>
                                        <a href="#" class="" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><span>What is Lorem Ipsum ?</span></a>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionExample">
                                    <div class="card-body">
                                     <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header" id="headingFore">
                                    <h5>
                                        <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapseFore" aria-expanded="false" aria-controls="collapseThree">    <span>Where does it come from ?</span>
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapseFore" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                    <div class="card-body">
                                     <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header" id="headingFive">
                                    <h5>
                                        <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseThree">    <span>Why do we use it ?</span>
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapseFive" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                    <div class="card-body">
                                     <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header" id="headingSix">
                                    <h5>
                                        <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseThree">
                                            <span>Where can I get some ?</span>
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapseSix" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                    <div class="card-body">
                                     <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!--====== FAQ PAGE PART ENDS ======-->
   
    <!--====== CLIENT PART START ======-->
    
    <section id="client-part" class="pt-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center">
                        <img src="images/client/c.png" alt="icon">
                        <h2>Our Exhort Happy Clients say !</h2>
                        <ul>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <p>Nunc molestie mi nunc, nec accumsan libero dignissim sit amet. Fusce sit amet tincidunt metus. Nunc eu risus  suscipit massa dapibus blandit. Vivamus ac commodo eros.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="client-slied owl-carousel">
                    <div class="col-lg-12">
                        <div class="singel-client mt-50">
                            <div class="client-thum">
                                <div class="client-img">
                                    <img src="images/client/c-1.jpg" alt="Client">
                                </div>
                                <div class="client-head">
                                    <h5>Anil Barua</h5>
                                    <span>Laravel Developer</span>
                                </div>
                            </div>
                            <div class="client-text mt-35">
                                <p>Nullam condimentum varius ipsum at viverra. Donec tortor metus, sollicitudin vitae est id, ullamcorper pretium tortor. Phasellus bibendum augue ac arcu pharetra congue. Proin accumsan elit et elit vehicula, sit amet fringilla.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="singel-client mt-50">
                            <div class="client-thum">
                                <div class="client-img">
                                    <img src="images/client/c-2.jpg" alt="Client">
                                </div>
                                <div class="client-head">
                                    <h5>Toya Kanti Roy</h5>
                                    <span>Graphic Designer</span>
                                </div>
                            </div>
                            <div class="client-text mt-35">
                                <p>Nullam condimentum varius ipsum at viverra. Donec tortor metus, sollicitudin vitae est id, ullamcorper pretium tortor. Phasellus bibendum augue ac arcu pharetra congue. Proin accumsan elit et elit vehicula, sit amet fringilla.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="singel-client mt-50">
                            <div class="client-thum">
                                <div class="client-img">
                                    <img src="images/client/c-1.jpg" alt="Client">
                                </div>
                                <div class="client-head">
                                    <h5>Anil Barua</h5>
                                    <span>Laravel Developer</span>
                                </div>
                            </div>
                            <div class="client-text mt-35">
                                <p>Nullam condimentum varius ipsum at viverra. Donec tortor metus, sollicitudin vitae est id, ullamcorper pretium tortor. Phasellus bibendum augue ac arcu pharetra congue. Proin accumsan elit et elit vehicula, sit amet fringilla.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="singel-client mt-50">
                            <div class="client-thum">
                                <div class="client-img">
                                    <img src="images/client/c-2.jpg" alt="Client">
                                </div>
                                <div class="client-head">
                                    <h5>Toya Kanti Roy</h5>
                                    <span>Graphic Designer</span>
                                </div>
                            </div>
                            <div class="client-text mt-35">
                                <p>Nullam condimentum varius ipsum at viverra. Donec tortor metus, sollicitudin vitae est id, ullamcorper pretium tortor. Phasellus bibendum augue ac arcu pharetra congue. Proin accumsan elit et elit vehicula, sit amet fringilla.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!--====== CLIENT PART ENDS ======-->
   
    <!--====== DELIVERY PART START ======-->
    
    <section id="delivery-part" class="bg_cover" data-overlay="8" style="background-image: url(images/bg-2.jpg)">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 offset-xl-1">
                    <div class="delivery-text text-center pb-30">
                        <h2>Water Delivery 20 k.m.  Free Service</h2>
                        <p>Nunc molestie mi nunc, nec accumsan libero dignissim sit amet. Fusce sit amet tincidunt metus. Nunc eu risus suscipit massa dapibu.</p>
                        <a href="#">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="delivery-image d-none d-lg-flex align-items-end">
            <img src="images/delivery-van.png" alt="Iamge">
        </div>
    </section>
    
    <!--====== DELIVERY PART ENDS ======-->
   
    <!--====== FOOTER PART START ======-->
    
    @include('partials.footer')
    
    <!--====== FOOTER PART ENDS ======-->
   
    <!--====== BACK TO TOP PART START ======-->
    
    <a href="#" class="back-to-top">
        <img src="images/back-to-top.png" alt="Icon">
    </a>
    
    <!--====== BACK TO TOP PART ENDS ======-->
    @include('partials.js')
</body>

</html>
