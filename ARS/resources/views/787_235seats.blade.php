<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="front/css/bootstrap.min.css">
    <link rel="stylesheet" href="front/css/style.css">
    <script src="front/js/main.js"></script>
</head>
<body>
<!--business-->
<div class="container">
    <div class="row">
        <div class="col-3 seat-map plane-787">
            <div>
                <table class="business-class">
                    <img class="left-exit" src="front/images/loi%20ra%20trai.jpg" alt="">
                    <img class="right-exit" src="front/images/Loi%20ra%20phai.jpg" alt="">
                    <img class="left-labotory" src="front/images/PhongVeSinh.png" alt="">
                    <img class="kitchen" src="front/images/Bep.png" alt="">
                    <img class="right-labotory" src="front/images/PhongVeSinh.png" alt="">
                    <tr class="seat-row">
                        <td>A</td>
                        <td></td>
                        <td>B</td>
                        <td>C</td>
                        <td></td>
                        <td>D</td>
                    </tr>
                    <?php
                    for ($row=1;$row<8;$row++){
                        echo <<<EOT
                    <tr>
                    <td>
                        <div name="${row}A"><img src="front/images/icon-premium-seat0.png" alt=""></div>
                    </td>
                    <td>
                     $row
                    </td>
                    <td>
                        <div name="${row}B"><img src="front/images/icon-premium-seat0.png" alt=""></div>
                    </td>
                     <td>
                         <div name="${row}C"><img src="front/images/icon-premium-seat0.png" alt=""></div>
                    </td>
                    <td>
                     $row
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
                    <img class="left-labotory" src="front/images/PhongVeSinh.png" alt="">
                    <img class="kitchen" src="front/images/Bep.png" alt="">
                    <img class="right-labotory" src="front/images/PhongVeSinh.png" alt="">
                    <tr class="seat-row">
                        <td>A</td>
                        <td>B</td>
                        <td>C</td>
                        <td></td>
                        <td>D</td>
                        <td>E</td>
                        <td>F</td>
                        <td></td>
                        <td>G</td>
                        <td>H</td>
                        <td>K</td>
                    </tr>
                    <?php
                    for ($row=8;$row<=18;$row++) {
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
                        <div name="${row}F"><img src="front/images/icon-premium-seat2.png" alt=""></div>
                    </td>
                    <td>
                    $row
                    </td>
                    <td>
                        <div name="${row}G"><img src="front/images/icon-premium-seat2.png" alt=""></div>
                    </td>
                    <td>
                        <div name="${row}H"><img src="front/images/icon-premium-seat2.png" alt=""></div>
                    </td>
                    <td>
                        <div name="${row}K"><img src="front/images/icon-premium-seat2.png" alt=""></div>
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
                    <img class="left-labotory" src="front/images/PhongVeSinh.png" alt="">
                    <img class="kitchen" src="front/images/Bep.png" alt="">
                    <img class="right-labotory" src="front/images/PhongVeSinh.png" alt="">
                    <tr class="seat-row">
                        <td>A</td>
                        <td>B</td>
                        <td>C</td>
                        <td></td>
                        <td>D</td>
                        <td>E</td>
                        <td>F</td>
                        <td></td>
                        <td>G</td>
                        <td>H</td>
                        <td>K</td>
                    </tr>
                    <?php
                    for ($row=19;$row<=30;$row++){
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
                        <div name="${row}F"><img src="front/images/icon-premium-seat2.png" alt=""></div>
                    </td>
                    <td>
                    $row
                    </td>
                    <td>
                        <div name="${row}G"><img src="front/images/icon-premium-seat2.png" alt=""></div>
                    </td>
                    <td>
                        <div name="${row}H"><img src="front/images/icon-premium-seat2.png" alt=""></div>
                    </td>
                    <td>
                        <div name="${row}K"><img src="front/images/icon-premium-seat2.png" alt=""></div>
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
                <img class="left-labotory" src="front/images/PhongVeSinh.png" alt="">
                <img class="kitchen" src="front/images/Bep.png" alt="">
                <img class="right-labotory" src="front/images/PhongVeSinh.png" alt="">
            </table>
        </div>
    </div>
</div>
</body>
</html>
