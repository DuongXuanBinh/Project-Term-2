@extends('layout.normal')
@section('title','Seat')

@section('body')
<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(front/images/HEL_Popup_Teaser_E22.jpg); height: 400px">
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
                                                        <img class="left-exit" src="front/images/loi%20ra%20trai.jpg" alt="">
                                                        <img class="right-exit" src="front/images/Loi%20ra%20phai.jpg" alt="">
                                                        <img class="labotory" src="front/images/PhongVeSinh.png" alt="">
                                                        <img class="kitchen" src="front/images/Bep.png" alt="">
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
                        <div name="${row}A"><img src="front/images/icon-premium-seat0.png" alt=""></div>
                    </td>
                    <td>
                        <div name="${row}B"><img src="front/images/icon-premium-seat0.png" alt=""></div>
                    </td>
                     <td>
                     $row
                    </td>
                     <td>
                         <div name="${row}C"><img src="front/images/icon-premium-seat0.png" alt=""></div>
                    </td>
                     <td>
                         <div name="${row}D"><img src="front/images/icon-premium-seat0.png" alt=""></div>
                    </td>
    </tr>
    EOT;
                                                        }
                                                        ?>
                                                    </table>
                                                </div>
                                                <div>
                                                    <table class="economy-class">
                                                        <img class="left-exit" src="front/images/loi%20ra%20trai.jpg" alt="">
                                                        <img class="right-exit" src="front/images/Loi%20ra%20phai.jpg" alt="">
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
                        <div name="${row}A"><img src="front/images/icon-premium-seat2.png" alt=""></div>
                    </td>
                    <td>
                        <div name="${row}B"><img src="front/images/icon-premium-seat2.png" alt=""></div>
                    </td>
                     <td>
                        <div name="${row}C"><img src="front/images/icon-premium-seat2.png" alt=""></div>
                    </td>
                    <td>
                    $row
                    </td>
                    <td>
                        <div name="${row}D"><img src="front/images/icon-premium-seat2.png" alt=""></div>
                    </td>
                    <td>
                        <div name="${row}E"><img src="front/images/icon-premium-seat2.png" alt=""></div>
                    </td>
                    <td>
                        <div name="${row}G"><img src="front/images/icon-premium-seat2.png" alt=""></div>
                    </td>
    </tr>
    EOT;
                                                        }
                                                        ?>
                                                    </table>
                                                </div>
                                                <div>
                                                    <table class="economy-class">
                                                        <img class="left-exit" src="front/images/loi%20ra%20trai.jpg" alt="">
                                                        <img class="right-exit" src="front/images/Loi%20ra%20phai.jpg" alt="">
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
                        <div name="${row}A"><img src="front/images/icon-premium-seat2.png" alt=""></div>
                    </td>
                    <td>
                        <div name="${row}B"><img src="front/images/icon-premium-seat2.png" alt=""></div>
                    </td>
                     <td>
                        <div name="${row}C"><img src="front/images/icon-premium-seat2.png" alt=""></div>
                    </td>
                    <td>
                    $row
                    </td>
                    <td>
                        <div name="${row}D"><img src="front/images/icon-premium-seat2.png" alt=""></div>
                    </td>
                    <td>
                        <div name="${row}E"><img src="front/images/icon-premium-seat2.png" alt=""></div>
                    </td>
                    <td>
                        <div name="${row}G"><img src="front/images/icon-premium-seat2.png" alt=""></div>
                    </td>
    </tr>
    EOT;
                                                        }
                                                        ?>
                                                    </table>
                                                </div>
                                                <table class="economy-class">
                                                    <img class="left-exit" src="front/images/loi%20ra%20trai.jpg" alt="">
                                                    <img class="right-exit" src="front/images/Loi%20ra%20phai.jpg" alt="">
                                                    <img class="labotory" src="front/images/PhongVeSinh.png" alt="">
                                                    <img class="kitchen" src="front/images/Bep.png" alt="">
                                                </table>
                                            </div>
                                        </div>

                                        <div class="col-md-7">
                                            <div class="row  seat-note">
                                                <p style="margin-top: 20px;margin-bottom: 0">Note:</p>
                                            </div>

                                        <div class="row  seat-note">
                                            <div class="col-md-5 seat-img">
                                                <div class="row col-md-12">
                                                    <p><img src="front/images/icon-premium-seat0.png" alt="">First Class</p>
                                                </div>
                                                <div class="row col-md-12">
                                                    <p><img src="front/images/icon-premium-seat2.png" alt="">Economy Class</p>
                                                </div>
                                                <div class="row col-md-12">
                                                    <p><img src="front/images/icon-unavailable-seat.png" alt="">Unavailable Seat</p>
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
                                    <div class="row" style="display: flex">
                                        <div class="col-md-4" style="margin: auto 0;">
                                            <div class="seat-map plane-320">
                                                <div>
                                                    <table class="business-class">
                                                        <img class="left-exit" src="front/images/loi%20ra%20trai.jpg" alt="">
                                                        <img class="right-exit" src="front/images/Loi%20ra%20phai.jpg" alt="">
                                                        <img class="labotory" src="front/images/PhongVeSinh.png" alt="">
                                                        <img class="kitchen" src="front/images/Bep.png" alt="">
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
                        <div name="${row}A"><img src="front/images/icon-premium-seat0.png" alt=""></div>
                    </td>
                    <td>
                        <div name="${row}B"><img src="front/images/icon-premium-seat0.png" alt=""></div>
                    </td>
                     <td>
                     $row
                    </td>
                     <td>
                         <div name="${row}C"><img src="front/images/icon-premium-seat0.png" alt=""></div>
                    </td>
                     <td>
                         <div name="${row}D"><img src="front/images/icon-premium-seat0.png" alt=""></div>
                    </td>
    </tr>
    EOT;
                                                        }
                                                        ?>
                                                    </table>
                                                </div>
                                                <div>
                                                    <table class="economy-class">
                                                        <img class="left-exit" src="front/images/loi%20ra%20trai.jpg" alt="">
                                                        <img class="right-exit" src="front/images/Loi%20ra%20phai.jpg" alt="">
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
                        <div name="${row}A"><img src="front/images/icon-premium-seat2.png" alt=""></div>
                    </td>
                    <td>
                        <div name="${row}B"><img src="front/images/icon-premium-seat2.png" alt=""></div>
                    </td>
                     <td>
                        <div name="${row}C"><img src="front/images/icon-premium-seat2.png" alt=""></div>
                    </td>
                    <td>
                    $row
                    </td>
                    <td>
                        <div name="${row}D"><img src="front/images/icon-premium-seat2.png" alt=""></div>
                    </td>
                    <td>
                        <div name="${row}E"><img src="front/images/icon-premium-seat2.png" alt=""></div>
                    </td>
                    <td>
                        <div name="${row}G"><img src="front/images/icon-premium-seat2.png" alt=""></div>
                    </td>
    </tr>
    EOT;
                                                        }
                                                        ?>
                                                    </table>
                                                </div>
                                                <div>
                                                    <table class="economy-class">
                                                        <img class="left-exit" src="front/images/loi%20ra%20trai.jpg" alt="">
                                                        <img class="right-exit" src="front/images/Loi%20ra%20phai.jpg" alt="">
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
                        <div name="${row}A"><img src="front/images/icon-premium-seat2.png" alt=""></div>
                    </td>
                    <td>
                        <div name="${row}B"><img src="front/images/icon-premium-seat2.png" alt=""></div>
                    </td>
                     <td>
                        <div name="${row}C"><img src="front/images/icon-premium-seat2.png" alt=""></div>
                    </td>
                    <td>
                    $row
                    </td>
                    <td>
                        <div name="${row}D"><img src="front/images/icon-premium-seat2.png" alt=""></div>
                    </td>
                    <td>
                        <div name="${row}E"><img src="front/images/icon-premium-seat2.png" alt=""></div>
                    </td>
                    <td>
                        <div name="${row}G"><img src="front/images/icon-premium-seat2.png" alt=""></div>
                    </td>
    </tr>
    EOT;
                                                        }
                                                        ?>
                                                    </table>
                                                </div>
                                                <table class="economy-class">
                                                    <img class="left-exit" src="front/images/loi%20ra%20trai.jpg" alt="">
                                                    <img class="right-exit" src="front/images/Loi%20ra%20phai.jpg" alt="">
                                                    <img class="labotory" src="front/images/PhongVeSinh.png" alt="">
                                                    <img class="kitchen" src="front/images/Bep.png" alt="">
                                                </table>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="row  seat-note">
                                            <p style="margin-top: 20px;margin-bottom: 0">Note:</p>
                                        </div>
                                        <div class="row  seat-note">
                                            <div class="col-md-5 seat-img">
                                                <div class="row col-md-12">
                                                    <p><img src="front/images/icon-premium-seat0.png" alt="">First Class</p>
                                                </div>
                                                <div class="row col-md-12">
                                                    <p><img src="front/images/icon-premium-seat2.png" alt="">Economy Class</p>
                                                </div>
                                                <div class="row col-md-12">
                                                    <p><img src="front/images/icon-unavailable-seat.png" alt="">Unavailable Seat</p>
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
                        <td rowspan="2"><img src="front/images/429706-84%20-%20Copy.png" alt=""></td>
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
                        <td rowspan="2"><img src="front/images/429706-84%20-%20Copy.png" alt=""></td>
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

@endsection
