<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Traveler</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <!--	dat style-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
    <!-- Animate.css -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="css/icomoon.css">
    <!-- Themify Icons-->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="css/magnific-popup.css">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="css/bootstrap-datepicker.min.css">

    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <!-- Theme style  -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Modernizr JS -->
    <script src="js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <!--		jquery, jquery ui-->
    <script src="js/jquery-3.6.0.js"></script>
    <script src="js/jquery-ui.js"></script>
</head>
<body>

<nav class="gtco-nav" role="navigation">
    <div class="overlay"></div>
    <div class="gtco-container">
        <div class="row ">
            <div class="col-sm-4 col-xs-12 ">
                <div id="gtco-logo"><a href="index.html"><img class="img-responsive" src="images/logo_1.png" alt=""></a></div>
            </div>
            <div style="padding-top: 1.5rem" class="pt-4 col-xs-8 text-right menu-1 ">
                <ul>
                    <li><a href="destination.html">Book Flight</a></li>
                    <li class="has-dropdown">
                        <a href="#">Manage Booking</a>
                        <ul class="dropdown">
                            <li><a href="#">Confirm ticket</a></li>
                            <li><a href="#">Reschedule ticket</a></li>
                            <li><a href="#">Cancel ticket</a></li>
                        </ul>
                    </li>
                    <li><a href="pricing.html">Flight status</a></li>
                    <li><a href="contact.html">About us</a></li>
                    <li class="has-dropdown">
                        <a href="contact.html">Account</a>
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

<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(images/HEL_Popup_Teaser_E22.jpg); height: 400px">
    <div class="overlay"></div>
    <div class="gtco-container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0 text-center">
                <div class="row row-mt-15em">
                    <div style="margin-top: 10em" class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
                        <h1>If not now, then when?</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="gtco-container">
<form>
    <div class="col-md-12 mt-text animate-box"  style="background-color: #ecebeb82" data-animate-effect="fadeInUp">
        <div class="row">
            <div class="col-md-12">
                <div class="btn-group  booking-progress" role="group" aria-label="Basic example">
                    <button type="button" name="selectflight" class="first-button btn btn-secondary">Select flight</button>
                    <button type="button" name="passenger" class="second-button btn btn-secondary ">Passenger</button>
                    <button type="button" name="pickseat" class="second-button btn btn-secondary">Pick a seat</button>
                    <button type="button" name="checkout" class="second-button btn btn-secondary disable-button">Check out</button>
                </div>
            </div>
        </div>
        <div class="row col-md-12">
            <h2 style="text-align: center;letter-spacing: 2px;margin-top: 20px">PICK A SEAT</h2>
        </div>
    </div>
    </div>

<div class="gtco-container select_seats">
    <form>
        <div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
            <div class="row" style="margin-top: 20px;margin-bottom: 20px">
                <div class="col-md-9">
                    <ul class="nav nav-tabs">
                        <li class="out_bound_tab active"><a data-toggle="tab" href="#out_bound">Ha Noi (HAN) to Ho Chi Minh (SGN)</a></li>
                        <li class="in_bound_tab" ><a data-toggle="tab" href="#in_bound">Ho Chi Minh (SGN) to Ha Noi (HAN)</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="out_bound">
                            <form action="#" class="form" method="post">
                                <div class="row" style="display: flex">
                                    <div class="col-md-4" style="margin: auto 0;">
                                        <div class="seat-map plane-320">
                                            <div>
                                                <table class="business-class">
                                                    <img class="left-exit" src="images/loi%20ra%20trai.jpg" alt="">
                                                    <img class="right-exit" src="images/Loi%20ra%20phai.jpg" alt="">
                                                    <img class="labotory" src="images/PhongVeSinh.png" alt="">
                                                    <img class="kitchen" src="images/Bep.png" alt="">
                                                    <tr class="seat-row">
                                                        <td>A</td>
                                                        <td>B</td>
                                                        <td></td>
                                                        <td>C</td>
                                                        <td>D</td>
                                                    </tr>
                                                    <?php
                                                    for ($row=1;$row<5;$row++){
                                                        echo <<<EOT
                    <tr>
                    <td>
                        <div name="${row}A"><img src="images/icon-premium-seat0.png" alt=""></div>
                    </td>
                    <td>
                        <div name="${row}B"><img src="images/icon-premium-seat0.png" alt=""></div>
                    </td>
                     <td>
                     $row
                    </td>
                     <td>
                         <div name="${row}C"><img src="images/icon-premium-seat0.png" alt=""></div> 
                    </td>  
                     <td>
                         <div name="${row}D"><img src="images/icon-premium-seat0.png" alt=""></div> 
                    </td>
    </tr>
    EOT;
                                                    }
                                                    ?>
                                                </table>
                                            </div>
                                            <div>
                                                <table class="economy-class">
                                                    <img class="left-exit" src="images/loi%20ra%20trai.jpg" alt="">
                                                    <img class="right-exit" src="images/Loi%20ra%20phai.jpg" alt="">
                                                    <tr class="seat-row">
                                                        <td>A</td>
                                                        <td>B</td>
                                                        <td>C</td>
                                                        <td></td>
                                                        <td>D</td>
                                                        <td>E</td>
                                                        <td>G</td>
                                                    </tr>
                                                    <?php
                                                    for ($row=5;$row<=15;$row++) {
                                                        echo <<<EOT
                    <tr>
                    <td>
                        <div name="${row}A"><img src="images/icon-premium-seat2.png" alt=""></div>
                    </td>
                    <td>
                        <div name="${row}B"><img src="images/icon-premium-seat2.png" alt=""></div>
                    </td>
                     <td>
                        <div name="${row}C"><img src="images/icon-premium-seat2.png" alt=""></div>
                    </td>
                    <td>
                    $row
                    </td>
                    <td>
                        <div name="${row}D"><img src="images/icon-premium-seat2.png" alt=""></div>
                    </td>
                    <td>
                        <div name="${row}E"><img src="images/icon-premium-seat2.png" alt=""></div>
                    </td>
                    <td>
                        <div name="${row}G"><img src="images/icon-premium-seat2.png" alt=""></div>
                    </td>
    </tr>
    EOT;
                                                    }
                                                    ?>
                                                </table>
                                            </div>
                                            <div>
                                                <table class="economy-class">
                                                    <img class="left-exit" src="images/loi%20ra%20trai.jpg" alt="">
                                                    <img class="right-exit" src="images/Loi%20ra%20phai.jpg" alt="">
                                                    <tr class="seat-row">
                                                        <td>A</td>
                                                        <td>B</td>
                                                        <td>C</td>
                                                        <td></td>
                                                        <td>D</td>
                                                        <td>E</td>
                                                        <td>G</td>
                                                    </tr>
                                                    <?php
                                                    for ($row=16;$row<=25;$row++){
                                                        echo <<<EOT
                    <tr>
                    <td>
                        <div name="${row}A"><img src="images/icon-premium-seat2.png" alt=""></div>
                    </td>
                    <td>
                        <div name="${row}B"><img src="images/icon-premium-seat2.png" alt=""></div>
                    </td>
                     <td>
                        <div name="${row}C"><img src="images/icon-premium-seat2.png" alt=""></div>
                    </td>
                    <td>
                    $row
                    </td>
                    <td>
                        <div name="${row}D"><img src="images/icon-premium-seat2.png" alt=""></div>
                    </td>
                    <td>
                        <div name="${row}E"><img src="images/icon-premium-seat2.png" alt=""></div>
                    </td>
                    <td>
                        <div name="${row}G"><img src="images/icon-premium-seat2.png" alt=""></div>
                    </td>
    </tr>
    EOT;
                                                    }
                                                    ?>
                                                </table>
                                            </div>
                                            <table class="economy-class">
                                                <img class="left-exit" src="images/loi%20ra%20trai.jpg" alt="">
                                                <img class="right-exit" src="images/Loi%20ra%20phai.jpg" alt="">
                                                <img class="labotory" src="images/PhongVeSinh.png" alt="">
                                                <img class="kitchen" src="images/Bep.png" alt="">
                                            </table>

                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="row  seat-note">
                                                <p>Note:</p>
                                        </div>
                                        <div class="row  seat-note">
                                            <div class="col-md-5 seat-img">
                                                <div class="row col-md-12">
                                                    <p><img src="images/icon-premium-seat0.png" alt="">First Class</p>
                                                </div>
                                                <div class="row col-md-12">
                                                    <p><img src="images/icon-premium-seat2.png" alt="">Economy Class</p>
                                                </div>
                                                <div class="row col-md-12">
                                                    <p><img src="images/icon-unavailable-seat.png" alt="">Unavailable Seat</p>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <p>To request your seat, please click on the seat you would like on the map. Your seat selection cannot be confirmed until you finish your purchase. The preferred seat fee will not be refunded. If you do not select a seat, your seat will be automatically assigned within 25 hours before departure.</p>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-left: 20px;margin-top: 40px">
                                            <div class="row col-md-12 select_seat_passenger" id="passenger_1">
                                                <div class="col-md-2"><span>Mr.</span></div>
                                                <div class="col-md-7">Dat/Nguyen Tien</div>
                                                <div class="col-md-3" style="padding: 0"><p class="btn_select_seat">(Select Seat)</p></div>
                                            </div>
                                            <div class="row col-md-12 select_seat_passenger" id="passenger_2">
                                                <div class="col-md-2"><span>Mr.</span></div>
                                                <div class="col-md-7">Binh Duong</div>
                                                <div class="col-md-3" style="padding: 0"><p class="btn_select_seat">(Select Seat)</p></div>
                                            </div>
                                            <div class="row col-md-12 select_seat_passenger" id="passenger_3">
                                                <div class="col-md-2"><span>Mrs.</span></div>
                                                <div class="col-md-7">Son Nguyen</div>
                                                <div class="col-md-3" style="padding: 0"><p class="btn_select_seat">(Select Seat)</p></div>
                                            </div>
                                        </div>
                                        <div class="row col-md-12">
                                            <span class="seat-note">* Please read out our policy carefully.</span><br>
                                            <span class="seat-note">* Once picked a seat, you can not change.</span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="in_bound">
                            <form action="#" class="form" method="post">
                                <div class="row" style="display: flex">
                                    <div class="col-md-4" style="margin: auto 0;">
                                        <div class="seat-map plane-320">
                                            <div>
                                                <table class="business-class">
                                                    <img class="left-exit" src="images/loi%20ra%20trai.jpg" alt="">
                                                    <img class="right-exit" src="images/Loi%20ra%20phai.jpg" alt="">
                                                    <img class="labotory" src="images/PhongVeSinh.png" alt="">
                                                    <img class="kitchen" src="images/Bep.png" alt="">
                                                    <tr class="seat-row">
                                                        <td>A</td>
                                                        <td>B</td>
                                                        <td></td>
                                                        <td>C</td>
                                                        <td>D</td>
                                                    </tr>
                                                    <?php
                                                    for ($row=1;$row<5;$row++){
                                                        echo <<<EOT
                    <tr>
                    <td>
                        <div name="${row}A"><img src="images/icon-premium-seat0.png" alt=""></div>
                    </td>
                    <td>
                        <div name="${row}B"><img src="images/icon-premium-seat0.png" alt=""></div>
                    </td>
                     <td>
                     $row
                    </td>
                     <td>
                         <div name="${row}C"><img src="images/icon-premium-seat0.png" alt=""></div> 
                    </td>  
                     <td>
                         <div name="${row}D"><img src="images/icon-premium-seat0.png" alt=""></div> 
                    </td>
    </tr>
    EOT;
                                                    }
                                                    ?>
                                                </table>
                                            </div>
                                            <div>
                                                <table class="economy-class">
                                                    <img class="left-exit" src="images/loi%20ra%20trai.jpg" alt="">
                                                    <img class="right-exit" src="images/Loi%20ra%20phai.jpg" alt="">
                                                    <tr class="seat-row">
                                                        <td>A</td>
                                                        <td>B</td>
                                                        <td>C</td>
                                                        <td></td>
                                                        <td>D</td>
                                                        <td>E</td>
                                                        <td>G</td>
                                                    </tr>
                                                    <?php
                                                    for ($row=5;$row<=15;$row++) {
                                                        echo <<<EOT
                    <tr>
                    <td>
                        <div name="${row}A"><img src="images/icon-premium-seat2.png" alt=""></div>  
                    </td>
                    <td>
                        <div name="${row}B"><img src="images/icon-premium-seat2.png" alt=""></div>    
                    </td>
                     <td>
                        <div name="${row}C"><img src="images/icon-premium-seat2.png" alt=""></div>     
                    </td>  
                    <td>
                    $row
                    </td>
                    <td>
                        <div name="${row}D"><img src="images/icon-premium-seat2.png" alt=""></div>                
                    </td>
                    <td>
                        <div name="${row}E"><img src="images/icon-premium-seat2.png" alt=""></div> 
                    </td>
                    <td>
                        <div name="${row}G"><img src="images/icon-premium-seat2.png" alt=""></div>    
                    </td>
    </tr>
    EOT;
                                                    }
                                                    ?>
                                                </table>
                                            </div>
                                            <div>
                                                <table class="economy-class">
                                                    <img class="left-exit" src="images/loi%20ra%20trai.jpg" alt="">
                                                    <img class="right-exit" src="images/Loi%20ra%20phai.jpg" alt="">
                                                    <tr class="seat-row">
                                                        <td>A</td>
                                                        <td>B</td>
                                                        <td>C</td>
                                                        <td></td>
                                                        <td>D</td>
                                                        <td>E</td>
                                                        <td>G</td>
                                                    </tr>
                                                    <?php
                                                    for ($row=16;$row<=25;$row++){
                                                        echo <<<EOT
                    <tr>
                    <td>
                        <div name="${row}A"><img src="images/icon-premium-seat2.png" alt=""></div>  
                    </td>
                    <td>
                        <div name="${row}B"><img src="images/icon-premium-seat2.png" alt=""></div>    
                    </td>
                     <td>
                        <div name="${row}C"><img src="images/icon-premium-seat2.png" alt=""></div>     
                    </td>  
                    <td>
                    $row
                    </td>
                    <td>
                        <div name="${row}D"><img src="images/icon-premium-seat2.png" alt=""></div>                
                    </td>
                    <td>
                        <div name="${row}E"><img src="images/icon-premium-seat2.png" alt=""></div> 
                    </td>
                    <td>
                        <div name="${row}G"><img src="images/icon-premium-seat2.png" alt=""></div>    
                    </td>
    </tr>
    EOT;
                                                    }
                                                    ?>
                                                </table>
                                            </div>
                                            <table class="economy-class">
                                                <img class="left-exit" src="images/loi%20ra%20trai.jpg" alt="">
                                                <img class="right-exit" src="images/Loi%20ra%20phai.jpg" alt="">
                                                <img class="labotory" src="images/PhongVeSinh.png" alt="">
                                                <img class="kitchen" src="images/Bep.png" alt="">
                                            </table>

                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="row  seat-note">
                                            <p>Note:</p>
                                        </div>
                                        <div class="row  seat-note">
                                            <div class="col-md-5 seat-img">
                                                <div class="row col-md-12">
                                                    <p><img src="images/icon-premium-seat0.png" alt="">First Class</p>
                                                </div>
                                                <div class="row col-md-12">
                                                    <p><img src="images/icon-premium-seat2.png" alt="">Economy Class</p>
                                                </div>
                                                <div class="row col-md-12">
                                                    <p><img src="images/icon-unavailable-seat.png" alt="">Unavailable Seat</p>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <p>To request your seat, please click on the seat you would like on the map. Your seat selection cannot be confirmed until you finish your purchase. The preferred seat fee will not be refunded. If you do not select a seat, your seat will be automatically assigned within 25 hours before departure.</p>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-left: 20px;margin-top: 40px">
                                            <div class="row col-md-12 select_seat_passenger" id="passenger_1">
                                                <div class="col-md-2"><span>Mr.</span></div>
                                                <div class="col-md-7">Dat/Nguyen Tien</div>
                                                <div class="col-md-3" style="padding: 0"><p class="btn_select_seat">(Select Seat)</p></div>
                                            </div>
                                            <div class="row col-md-12 select_seat_passenger" id="passenger_2">
                                                <div class="col-md-2"><span>Mr.</span></div>
                                                <div class="col-md-7">Binh Duong</div>
                                                <div class="col-md-3" style="padding: 0"><p class="btn_select_seat">(Select Seat)</p></div>
                                            </div>
                                            <div class="row col-md-12 select_seat_passenger" id="passenger_3">
                                                <div class="col-md-2"><span>Mrs.</span></div>
                                                <div class="col-md-7">Son Nguyen</div>
                                                <div class="col-md-3" style="padding: 0"><p class="btn_select_seat">(Select Seat)</p></div>
                                            </div>
                                        </div>
                                        <div class="row col-md-12">
                                            <span class="seat-note">* Please read out our policy carefully.</span><br>
                                            <span class="seat-note">* Once picked a seat, you can not change.</span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        <div class="col-md-3 flight_detail">
            <div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
                <table>
                    <tr>
                        <th colspan="3">13/5/2021 --- HV121</th>
                    </tr>
                    <tr>
                        <td>Ha Noi</td>
                        <td rowspan="2"><img src="images/429706-84%20-%20Copy.png" alt=""></td>
                        <td>Ho Chi Minh</td>
                    </tr>
                    <tr>
                        <td>18:50</td>
                        <td>19:50</td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <th colspan="3">13/5/2021 --- HV121</th>
                    </tr>
                    <tr>
                        <td>Ha Noi</td>
                        <td rowspan="2"><img src="images/429706-84%20-%20Copy.png" alt=""></td>
                        <td>Ho Chi Minh</td>
                    </tr>
                    <tr>
                        <td>18:50</td>
                        <td>19:50</td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <th colspan="2">Passenger</th>
                    </tr>
                    <tr>
                        <td>Mr.</td>
                        <td>Xuan Binh/Duong</td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <th colspan="2">Price (4 passengers)</th>
                    </tr>
                    <tr>
                        <td>Ticket Fare</td>
                        <td>VND 1000</td>
                    </tr>
                    <tr>
                        <td>Airport Tax</td>
                        <td>VND 1000</td>
                    </tr>
                    <tr>
                        <td>Admin Fee</td>
                        <td>VND 1000</td>
                    </tr>
                    <tr>
                        <td>Airport Security</td>
                        <td>VND 1000</td>
                    </tr>
                    <tr>
                        <td>System Admin</td>
                        <td>VND 1000</td>
                    </tr>
                    <tr>
                        <td>Seat Fee</td>
                        <td>VND 1000</td>
                    </tr>
                    <tr>
                        <td><b>Total</b></td>
                        <td><b>VND 100000</b></td>
                    </tr>
                    </table>
                </div>
            </div>
            </div>
            <div class="row back-continue">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <button class="btn btn-secondary" type="button">Back</button>
                    <button  class="btn btn-primary"  type="submit">Continue</button>
                </div>
            </div>
        </div>
    </form>
</div>



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
                <img class="mx-2 col-md-3" style="height: 118px !important; width: 150px!important;" src="images/logo_5star_skytrax.png" alt="">
                <img class="mx-2 col-md-3" style="height: 118px; width: 150px" src="images/logo_tripadvisor2020.png" alt="">
                <img class="mx-2 col-md-3" style="height: 118px; width: 150px" src="images/logo_world_economy.png" alt="">
            </p>

        </div>

    </div>
</footer>
<!-- </div> -->

<!-- jQuery -->
<!--	<script src="js/jquery.min.js"></script>-->
<!-- jQuery Easing -->
<script src="js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="js/jquery.waypoints.min.js"></script>
<!-- Carousel -->
<script src="js/owl.carousel.js"></script>
<!-- countTo -->
<script src="js/jquery.countTo.js"></script>

<!-- Stellar Parallax -->
<script src="js/jquery.stellar.min.js"></script>

<!-- Magnific Popup -->
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/magnific-popup-options.js"></script>

<!-- Datepicker -->
<!--	<script src="js/bootstrap-datepicker.min.js"></script>-->

<!-- Main -->
<script src="js/main.js"></script>
<!--	dat js-->
<script src="js/dat.js"></script>
</body>
</html>
