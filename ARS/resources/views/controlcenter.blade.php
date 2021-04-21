<!DOCTYPE HTML>
<!--
	Traveler by freehtml5.co
	Twitter: http://twitter.com/fh5co
	URL: http://freehtml5.co
-->
<html>
<head>
    <base href="{{asset('/')}}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Control Center | Helvetic</title>

    <!-- Facebook and Twitter integration -->

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">

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

</head>
<body>

<div id="page">


    <!-- <div class="page-inner"> -->
    <nav class="gtco-nav" role="navigation">
        <div class="overlay"></div>
        <div class="gtco-container">
            <div class="row ">
                <div class="col-sm-4 col-xs-12 ">
                    <div id="gtco-logo"><a><img class="img-responsive" style="width: 80%" src="front/images/logo_1.png" alt=""></a></div>
                </div>
                <div style="padding-top: 1.5rem" class="pt-4 col-xs-8 text-right menu-1 ">
                    <ul>
                        @if(session('email')&&session('password'))
                            <li class="has-dropdown">
                                <a>Hi, {{session('check')->lastname}}</a>
                                <ul class="dropdown">
                                    <li><a href="./profile/sign-out">Sign out</a></li>
                                </ul>
                            </li>
                        @else
                            <li><a href="./sign-in">Account</a></li>
                        @endif
                    </ul>
                </div>
            </div>

        </div>
    </nav>

    <header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="height:625px;background-image: url(front/images/NATSControl-centre0080a1-Copy.jpg)">
        <div class="overlay"></div>
        <div class="gtco-container">
            <<div class="row">
            <div class="col-md-12 col-md-offset-0 text-center" style="padding-top: 200px">
                <div class="row row-mt-15em">

                    <div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
                        <h1 style="font-size: 80px">CONTROL CENTER</h1>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </header>

    <footer id="gtco-footer" role="contentinfo" style="height: 200px;
    background-color: #000002;">
        <div class="gtco-container">
        </div>
    </footer>

</div>
</body>
</html>


<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>

<!-- jQuery -->
<script src="/front/js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="/front/js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="/front/js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="/front/js/jquery.waypoints.min.js"></script>
<!-- Carousel -->
<script src="/front/js/owl.carousel.min.js"></script>
<!-- countTo -->
<script src="/front/js/jquery.countTo.js"></script>

<!-- Stellar Parallax -->
<script src="/front/js/jquery.stellar.min.js"></script>

<!-- Magnific Popup -->
<script src="/front/js/jquery.magnific-popup.min.js"></script>
<script src="/front/js/magnific-popup-options.js"></script>

<!-- Datepicker -->
<script src="/front/js/bootstrap-datepicker.min.js"></script>


<!-- Main -->
<script src="/front/js/main.js"></script>

</body>
</html>
