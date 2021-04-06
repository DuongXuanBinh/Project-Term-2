<!DOCTYPE HTML>
<!--
	Traveler by freehtml5.co
	Twitter: http://twitter.com/fh5co
	URL: http://freehtml5.co
-->
<html>
<head>
    <meta charset="utf-8">

    <title>Traveler &mdash; Free Website Template, Free HTML5 Template by FreeHTML5.co</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
    <meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
    <meta name="author" content="FreeHTML5.co" />

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />


    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <!--	dat style-->
    <link rel="stylesheet" href="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">

    <!-- Animate.css -->
    <link rel="stylesheet" href="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/css/icomoon.css">
    <!-- Themify Icons-->
    <link rel="stylesheet" href="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/css/themify-icons.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/css/bootstrap.css">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/css/magnific-popup.css">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/css/bootstrap-datepicker.min.css">

    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/css/owl.theme.default.min.css">

    <!-- Theme style  -->
    <link rel="stylesheet" href="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/css/style.css">
    <!--customer style-->
<!--  -->

    <!-- Modernizr JS -->
    <script src="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/js/respond.min.js"></script>
    <![endif]-->
    <!--		jquery, jquery ui-->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>


<div id="page">


    <!-- <div class="page-inner"> -->
    <nav class="gtco-nav" role="navigation">
        <div class="gtco-container">
            <div class="row">
                <div class="col-sm-4 col-xs-12">
                    <div id="gtco-logo"><a href="index.html">Traveler <em>.</em></a></div>
                </div>
                <div class="col-xs-8 text-right menu-1">
                    <ul>
                        <li class="active"><a href="destination.blade.php">Destination</a></li>
                        <li class="has-dropdown">
                            <a href="#">Travel</a>
                            <ul class="dropdown">
                                <li><a href="#">Europe</a></li>
                                <li><a href="#">Asia</a></li>
                                <li><a href="#">America</a></li>
                                <li><a href="#">Canada</a></li>
                            </ul>
                        </li>
                        <li><a href="pricing.html">Pricing</a></li>
                        <li><a href="contact.blade.php">Contact</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </nav>

    <header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/images/img_bg_3.jpg)">
        <div class="overlay"></div>
        <div class="gtco-container">
            <div class="row">
            <div class="col-md-12 col-md-offset-0 text-center" style="padding-top: 220px">
                <div class="row row-mt-5em">
                    <div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
                        <h1>My Profile</h1>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </header>
    <div class="gtco-section" style="padding-top: 10px">
        <div class="gtco-container profile_form ">
            <div class="row pt-5">
                <div class="col-sm-3"><!--left col-->
                    <div class="text-center">
                        <img style="height: 200px; width: 200px" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
                        <label class="btn" for="avatar">Change Avatar</label>
                        <input type="file" id="avatar" class="text-center center-block file-upload">
                    </div><br>

                    <ul class="list-group">
<!--                        <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>-->
                        <li class="list-group-item text-right"><span class="pull-left"><strong>Sky miles</strong></span> 989 </li>
                        <li class="list-group-item text-right"><span class="pull-left"><strong>Flights</strong></span> 3</li>
                    </ul>
                    <p style="text-align: center;cursor:pointer;"  data-toggle="modal" data-target="#myModal"><i>Change password</i></p>
                    <div class="modal fade password-change" id="myModal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Change password</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <form action="">
                                <div class="modal-body">
                                    <label for="old-password">Current password:</label>
                                    <input type="password" id="old-password" required>
                                    <label for="new-password">New password:</label>
                                    <input type="password" id="new-password" required>
                                    <label for="cnew-password">Confirm new password:</label>
                                    <input type="password" id="cnew-password" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!--/col-3-->
                <div class="col-sm-9">
                            <form class="form" action="#" method="post" id="registrationForm">
                                <div class="col-xs-6">
                                        <label for="first_name"><h4>First name</h4></label>
                                        <input type="text" class="form-control" name="first_name" id="first_name" required placeholder="first name" title="enter your first name if any.">
                                    </div>


                                    <div class="col-xs-6">
                                        <label for="last_name"><h4>Last name</h4></label>
                                        <input type="text" class="form-control" name="last_name" id="last_name" required placeholder="last name" title="enter your last name if any.">
                                    </div>


                                    <div class="col-xs-6">
                                        <label for="phone"><h4>Phone</h4></label>
                                        <input type="text" class="form-control" name="phone" id="phone" required placeholder="enter phone" title="enter your phone number if any.">
                                    </div>



                                    <div class="col-xs-6">
                                        <label for="credit_card"><h4>Credit card number</h4></label>
                                        <input type="text" class="form-control" name="credit_card" id="credit_card" required placeholder="enter mobile number" title="enter your credit card number">
                                    </div>



                                    <div class="col-xs-6">
                                        <label for="youremail"><h4>Email</h4></label>
                                        <input type="email" class="form-control" name="email" id="youremail" required placeholder="you@email.com" title="enter your email.">
                                    </div>


                                    <div class="col-xs-6">
                                        <label for="address"><h4>Address</h4></label>
                                        <input type="text" class="form-control" id="address" placeholder="Your address" title="enter your address" required>
                                    </div>

                                    <div class="col-xs-6">
                                        <label for="sexs"><h4>Sex</h4></label>
                                        <input id="sex" list="sexs" class="form-control" placeholder="Sex" required>
                                        <datalist id="sexs">
                                            <option value="Male">
                                            <option value="Female">
                                        </datalist>
                                    </div>

                                    <div class="col-xs-6">
                                    <label for="age"><h4>Date of Birth</h4></label>
                                    <input type="date" id="age" class="form-control" placeholder="Date Of Birth" required>
                                    </div>

                                    <div class="col-xs-12">
                                        <br>
                                        <button class="btn btn-lg btn-primary edit" type="button">Edit</button>
                                        <button class="btn btn-lg save btn-primary pull-right" type="submit" >Save</button>
                                        <button class="btn btn-lg cancel btn-secondary pull-right" type="reset">Cancel</button>
                                    </div>

                            </form>

                        </div><!--/tab-pane-->
                    </div><!--/tab-pane-->
                </div>
            </div><!--/col-9-->
        </div><!--/row-->

<div id="gtco-subscribe">
    <div class="gtco-container">
        <div class="row animate-box">
            <div class="col-md-8 col-md-offset-2 text-center gtco-heading">
                <h2>Subscribe</h2>
                <p>Be the first to know about the new templates.</p>
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
            <div class="row row-p	b-md">
                <div class="col-md-4">
                    <div class="gtco-widget">
                        <h3>About Us</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore eos molestias quod sint ipsum possimus temporibus officia iste perspiciatis consectetur in fugiat repudiandae cum. Totam cupiditate nostrum ut neque ab?</p>
                    </div>
                </div>

                <div class="col-md-2 col-md-push-1">
                    <div class="gtco-widget">
                        <h3>Destination</h3>
                        <ul class="gtco-footer-links">
                            <li><a href="#">Europe</a></li>
                            <li><a href="#">Australia</a></li>
                            <li><a href="#">Asia</a></li>
                            <li><a href="#">Canada</a></li>
                            <li><a href="#">Dubai</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-2 col-md-push-1">
                    <div class="gtco-widget">
                        <h3>Hotels</h3>
                        <ul class="gtco-footer-links">
                            <li><a href="#">Luxe Hotel</a></li>
                            <li><a href="#">Italy 5 Star hotel</a></li>
                            <li><a href="#">Dubai Hotel</a></li>
                            <li><a href="#">Deluxe Hotel</a></li>
                            <li><a href="#">BoraBora Hotel</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-md-push-1">
                    <div class="gtco-widget">
                        <h3>Get In Touch</h3>
                        <ul class="gtco-quick-contact">
                            <li><a href="#"><i class="icon-phone"></i> +1 234 567 890</a></li>
                            <li><a href="#"><i class="icon-mail2"></i> info@freehtml5.co</a></li>
                            <li><a href="#"><i class="icon-chat"></i> Live Chat</a></li>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="row copyright">
                <div class="col-md-12">
                    <p class="pull-left">
                        <small class="block">&copy; 2016 Free HTML5. All Rights Reserved.</small>
                        <small class="block">Designed by <a href="https://freehtml5.co/" target="_blank">FreeHTML5.co</a> Demo Images: <a href="http://unsplash.com/" target="_blank">Unsplash</a></small>
                    </p>
                    <p class="pull-right">
                    <ul class="gtco-social-icons pull-right">
                        <li><a href="#"><i class="icon-twitter"></i></a></li>
                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                        <li><a href="#"><i class="icon-linkedin"></i></a></li>
                        <li><a href="#"><i class="icon-dribbble"></i></a></li>
                    </ul>
                    </p>
                </div>
            </div>

        </div>
    </footer>
    <!-- </div> -->

</div>

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>

<script src="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/js/jquery.waypoints.min.js"></script>
<!-- Carousel -->
<script src="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/js/owl.carousel.js"></script>
<!-- countTo -->
<script src="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/js/jquery.countTo.js"></script>

<!-- Stellar Parallax -->
<script src="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/js/jquery.stellar.min.js"></script>

<!-- Magnific Popup -->
<script src="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/js/jquery.magnific-popup.min.js"></script>
<script src="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/js/magnific-popup-options.js"></script>

<!-- Datepicker -->
<!--	<script src="js/bootstrap-datepicker.min.js"></script>-->

<!-- Main -->
<script src="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/js/main.js"></script>
<!--	dat js-->
<script src="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/js/dat.js"></script>
</body>
</html>

