<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    
    <!--====== Title ======-->
    <title>SmartID</title>
    
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="<?=base_url('assets/favicon.ico')?>" /> 
        
    <!--====== Magnific Popup CSS ======-->
    <link rel="stylesheet" href="<?=base_url()?>assets/frontend/assets/css/magnific-popup.css">
        
    <!--====== Slick CSS ======-->
    <link rel="stylesheet" href="<?=base_url()?>assets/frontend/assets/css/slick.css">
        
    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href="<?=base_url()?>assets/frontend/assets/css/LineIcons.css">
        
    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="<?=base_url()?>assets/frontend/assets/css/bootstrap.min.css">
    
    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="<?=base_url()?>assets/frontend/assets/css/default.css">
    
    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="<?=base_url()?>assets/frontend/assets/css/style.css">


    <script src="<?=base_url()?>assets/frontend/assets/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- charts -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/highcharts/highcharts.js">
        </script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/highcharts/highcharts-3d.js">
        </script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/highcharts/highcharts-more.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/highcharts/modules/solid-gauge.js"></script>   
    <script src="<?=base_url()?>assets/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/highcharts/modules/exporting.js">
        </script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/highcharts/themes/grid-light.js"></script>
    
</head>

<body>
    <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->
   
    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER PART ENDS ======-->
    
    <!--====== NAVBAR TWO PART START ======-->

    <section class="navbar-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                       
                        <a class="navbar-brand" href="#">
                            <img src="<?=base_url()?>assets/logo.png" alt="Logo" style="width: 106px;">
                        </a>
                        
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTwo" aria-controls="navbarTwo" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarTwo">
                            <ul class="navbar-nav m-auto" style="margin-right: 0px !important;">
                                <li class="nav-item active"><a class="page-scroll" href="#home">home</a></li>
                                <li class="nav-item"><a class="page-scroll" href="#aboutus">About Us</a></li>
                                <li class="nav-item"><a class="page-scroll" href="#portfolio">Portfolio</a></li>
                                <li class="nav-item"><a class="page-scroll" href="#pricing">Pricing</a></li>
                                <li class="nav-item"><a class="page-scroll" href="#team">Team</a></li>
                                <li class="nav-item"><a class="page-scroll" href="#blog">Blog</a></li>
                                <li class="nav-item"><a class="page-scroll" href="#contact">Contact</a></li>
                            </ul>
                        </div>
        
                    </nav> <!-- navbar -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== NAVBAR TWO PART ENDS ======-->
    
    <!--====== SLIDER PART START ======-->

    <section id="home" class="slider_area">
        <div id="carouselThree" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselThree" data-slide-to="0" class="active"></li>
                <li data-target="#carouselThree" data-slide-to="1"></li>
            </ol>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="slider-content">
                                    <h1 class="title" style="font-size: 30px !important;">Our Clients Are Our First Priority</h1>
                                    <p class="text">PERFORMA TERBAIK WUJUD KUALITAS KAMI</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                </div>
                            </div>
                        </div> <!-- row -->
                    </div> <!-- container -->
                    <div class="slider-image-box d-none d-lg-flex align-items-end">
                        <div class="slider-image">
                            <img src="<?=base_url()?>assets/frontend/assets/images/slider/1.png" alt="Hero">
                        </div> <!-- slider-imgae -->
                    </div> <!-- slider-imgae box -->
                </div> <!-- carousel-item --> 

                <div class="carousel-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="slider-content">
                                    <h1 class="title" style="font-size: 30px !important;">Our Clients Are Our First Priority</h1>
                                    <p class="text">PERFORMA TERBAIK WUJUD KUALITAS KAMI</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                </div> <!-- slider-content -->
                            </div>
                        </div> <!-- row -->
                    </div> <!-- container -->
                    <div class="slider-image-box d-none d-lg-flex align-items-end">
                        <div class="slider-image">
                            <img src="<?=base_url()?>assets/frontend/assets/images/slider/3.png" alt="Hero">
                        </div> <!-- slider-imgae -->
                    </div> <!-- slider-imgae box -->
                </div> <!-- carousel-item -->
            </div>

            <a class="carousel-control-prev" href="#carouselThree" role="button" data-slide="prev">
                <i class="lni lni-arrow-left"></i>
            </a>
            <a class="carousel-control-next" href="#carouselThree" role="button" data-slide="next">
                <i class="lni lni-arrow-right"></i>
            </a>
        </div>
    </section>
    <img src="<?=base_url('assets/bg-head.png')?>" alt="" style="margin-top: -152px;position: absolute;">

    <!--====== SLIDER PART ENDS ======-->
    
    <!--====== FEATRES TWO PART START ======-->

    <section id="aboutus" class="features-area" style="padding-bottom: 115px;">
        <div class="container">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <img src="<?=base_url('assets/trophy.jpg')?>" alt="">
                    </div>
                    <div class="col-md-8">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-1">
                                    <div style="background-color: #f5c226;height: 28px;width: 7px !important;"></div>
                                </div>
                                <div class="col-md-11">
                                    <p style="font-size: 28px;font-weight: 700;color: #253c6b;margin-left: -27px;">PENGHARGAAN ATAS DEDIKASI</p><br>
                                    <p style="margin-left: -27px;margin-bottom: 21px;color: #bfbebe;font-size: 14px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    <p style="margin-left: -27px;color: #bfbebe;font-size: 14px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <a class="btn btn-md btn-warning page-scroll" href="#portfolio" style="color: white;font-weight: 600;margin-left: 32px;margin-top: 39px;border-radius:0px">BROWSE OUR WORK</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- container -->
    </section>

    <!--====== FEATRES TWO PART ENDS ======-->

    <?=@$_content?>
    
    
    
    <!--====== FOOTER PART START ======-->

    <section class="footer-area footer-dark">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="footer-logo text-center">
                        <a class="mt-30" href="index.html"><img src="<?=base_url()?>assets/logo.png" alt="Logo" style="width: 106px;"></a>
                    </div> <!-- footer logo -->
                    <ul class="social text-center mt-60">
                        <li><a href="#"><i class="lni lni-facebook-filled"></i></a></li>
                        <li><a href="#"><i class="lni lni-twitter-original"></i></a></li>
                        <li><a href="#"><i class="lni lni-instagram-original"></i></a></li>
                        <li><a href="#"><i class="lni lni-linkedin-original"></i></a></li>
                    </ul> <!-- social -->
                    <div class="copyright text-center mt-35">
                        <p class="text">Thank You</p>
                    </div> <!--  copyright -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== FOOTER PART ENDS ======-->
    
    <!--====== BACK TOP TOP PART START ======-->

    <a href="#" class="back-to-top"><i class="lni lni-chevron-up"></i></a>

    <!--====== BACK TOP TOP PART ENDS ======-->    

    <!--====== PART START ======-->

<!--
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-">
                    
                </div>
            </div>
        </div>
    </section>
-->

    <!--====== PART ENDS ======-->

    <!--====== Jquery js ======-->
    <script src="<?=base_url()?>assets/frontend/assets/js/vendor/modernizr-3.7.1.min.js"></script>
    
    <!--====== Bootstrap js ======-->
    <script src="<?=base_url()?>assets/frontend/assets/js/popper.min.js"></script>
    <script src="<?=base_url()?>assets/frontend/assets/js/bootstrap.min.js"></script>
    
    <!--====== Slick js ======-->
    <script src="<?=base_url()?>assets/frontend/assets/js/slick.min.js"></script>
    
    <!--====== Magnific Popup js ======-->
    <script src="<?=base_url()?>assets/frontend/assets/js/jquery.magnific-popup.min.js"></script>
    
    <!--====== Ajax Contact js ======-->
    <script src="<?=base_url()?>assets/frontend/assets/js/ajax-contact.js"></script>
    
    <!--====== Isotope js ======-->
    <script src="<?=base_url()?>assets/frontend/assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="<?=base_url()?>assets/frontend/assets/js/isotope.pkgd.min.js"></script>
    
    <!--====== Scrolling Nav js ======-->
    <script src="<?=base_url()?>assets/frontend/assets/js/jquery.easing.min.js"></script>
    <script src="<?=base_url()?>assets/frontend/assets/js/scrolling-nav.js"></script>
    
    <!--====== Main js ======-->
    <script src="<?=base_url()?>assets/frontend/assets/js/main.js"></script>
    
</body>

</html>
