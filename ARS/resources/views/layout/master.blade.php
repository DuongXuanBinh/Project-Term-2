<!DOCTYPE HTML>
<html>
<head>
{{--    <base href="{{asset('/')}}">--}}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')|Helvetic</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <!--	dat style-->
    <link rel="stylesheet" href="front/css/bootstrap.min.css">
    <!--	<link rel="stylesheet" href="css/jquery-ui.css">-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
    <!-- Animate.css -->
    <link rel="stylesheet" href="front/css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="front/css/icomoon.css">
    <!-- Themify Icons-->
    <link rel="stylesheet" href="front/css/themify-icons.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="front/css/bootstrap.css">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="front/css/magnific-popup.css">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="front/css/bootstrap-datepicker.min.css">

    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="front/css/owl.carousel.min.css">
    <link rel="stylesheet" href="front/css/owl.theme.default.min.css">

    <!-- Theme style  -->
    <link rel="stylesheet" href="front/css/style.css">

    <!-- Modernizr JS -->
    <script src="front/js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="front/js/respond.min.js"></script>
    <![endif]-->
    <!--		jquery, jquery ui-->
    <script src="front/js/jquery-3.6.0.js"></script>
    <script src="front/js/jquery-ui.js"></script>
</head>
<body>

<div class="gtco-loader"></div>

<div id="page">


    <!-- <div class="page-inner"> abc-->
    <nav class="gtco-nav" role="navigation">
        <div class="overlay"></div>
        <div class="gtco-container">
            <div class="row ">
                <div class="col-sm-4 col-xs-12 ">
                    <div id="gtco-logo"><a href="index.blade.php"><img class="img-responsive" src="front/images/logo_1.png" alt=""></a></div>
                </div>
                <div style="padding-top: 1.5rem" class="pt-4 col-xs-8 text-right menu-1 ">
                    <ul>
                        <li><a href="public/destination.html">Book Flight</a></li>
                        <li class="has-dropdown">
                            <a href="#">Discover</a>
                            <ul class="dropdown">
                                <li><a href="#">Destination</a></li>
                                <li><a href="#">Policy</a></li>
                                <li><a href="#">Promotion</a></li>
                            </ul>
                        </li>
                        <li><a href="">Manage Booking</a></li>
                        <li><a href="pricing.html">Flight status</a></li>
                        <li><a href="public/contact.html">Contact</a></li>
                        <li class="has-dropdown">
                            <a href="public/contact.html">Account</a>
                            <ul class="dropdown">
                                <li><a href="#">Log in</a></li>
                                <li><a href="#">Sign up</a></li>
                                <li><a href="#">Log out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </nav>



    @yield('body')


    <div id="gtco-subscribe">
        <div class="gtco-container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center gtco-heading">
                    <h2>Subscribe</h2>
                    <p>Be the first to know about the new promotions.</p>
                </div>
            </div>
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2">
                    <form class="form-inline">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Your Email">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <button type="submit" class="btn btn-default btn-block">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer id="gtco-footer" role="contentinfo">
        <div class="gtco-container">
            <div class="row">


                <div class="col-md-4 col-md-push-1 ">

                    <div class="gtco-widget">
                        <h3>About us</h3>
                        <p>
                            <small> Contact Center for calls within Vietnam (24/7): 1900 1100</small>
                            <small> space  For Lotusmiles members: 1900 1800</small>
                            <small> space  For calls from outside Vietnam (24/7): +84 24 38320320</small>
                            <small> none  Email: Telesales@VehelticAir@gmail.com</small>
                        </p>
                    </div>
                </div>

                <div class="col-md-2 col-md-push-1">
                    <div class="gtco-widget">
                        <h3>Flight</h3>
                        <ul class="gtco-footer-links">
                            <li><a href="#">Booking</a></li>
                            <li><a href="#">Search Flight</a></li>
                            <li><a href="#">Flight status</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-2 col-md-push-1 ">

                    <div class="gtco-widget">
                        <h3>Support</h3>
                        <ul class="gtco-footer-links">
                            <li><a href="#">Promotion</a></li>
                            <li><a href="#">Policy</a></li>
                            <li><a href="#">Destination</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3  col-md-push-1">

                    <div class="gtco-widget">
                        <h3>Get In Touch</h3>
                        <ul class="gtco-quick-contact">
                            <li><a href="#"><i class="icon-phone"></i> 1900-9999</a></li>
                            <li><a href="#"><i class="icon-mail2"></i> HelveticAir@gmail.com</a></li>
                            <li><a href="#"><i class="icon-chat"></i> Live Chat</a></li>
                            <li><a href="#"><i class="icon-twitter"></i> Twitter</a></li>
                            <li><a href="#"><i class="icon-facebook"></i> Facebook</a></li>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="row copyright pt-0 ">

                <p class="col-md-4 col-md-push-1 ">
                    <small class="block">&copy; 2016 Free HTML5. All Rights Reserved.</small>
                    <small class="block">
                        Designed by <a href="https://freehtml5.co/" target="_blank">FreeHTML5.co</a> Demo Images: <a href="http://unsplash.com/" target="_blank">Unsplash</a>
                    </small>
                </p>


                <p class="col-md-7 col-md-push-2 row">
                    <img class="mx-2 col-md-3" style="height: 118px !important; width: 150px!important;" src="front/images/logo_5star_skytrax.png" alt="">
                    <img class="mx-2 col-md-3" style="height: 118px; width: 150px" src="front/images/logo_tripadvisor2020.png" alt="">
                    <img class="mx-2 col-md-3" style="height: 118px; width: 150px" src="front/images/logo_world_economy.png" alt="">
                </p>

            </div>

        </div>
    </footer>
    <!-- </div> -->

</div>

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>

<!-- jQuery -->
<!--	<script src="js/jquery.min.js"></script>-->
<!-- jQuery Easing -->
<script src="front/js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="front/js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="front/js/jquery.waypoints.min.js"></script>
<!-- Carousel -->
<script src="front/js/owl.carousel.js"></script>
<!-- countTo -->
<script src="front/js/jquery.countTo.js"></script>

<!-- Stellar Parallax -->
<script src="front/js/jquery.stellar.min.js"></script>

<!-- Magnific Popup -->
<script src="front/js/jquery.magnific-popup.min.js"></script>
<script src="front/js/magnific-popup-options.js"></script>

<!-- Datepicker -->
<!--	<script src="js/bootstrap-datepicker.min.js"></script>-->

<!-- Main -->
<script src="front/js/main.js"></script>
<!--	dat js-->
<script src="front/js/dat.js"></script>
</body>
</html>
