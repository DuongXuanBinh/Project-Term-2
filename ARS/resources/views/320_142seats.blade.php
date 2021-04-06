<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/css/style.css">
    <script src="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/js/main.js"></script>
</head>
<body>
<!--business-->
<div class="container">
    <div class="row">
        <div class="col-3 seat-map plane-320">
            <div>
                <table class="business-class">
                    <img class="left-exit" src="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/images/loi%20ra%20trai.jpg" alt="">
                    <img class="right-exit" src="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/images/Loi%20ra%20phai.jpg" alt="">
                    <img class="labotory" src="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/images/PhongVeSinh.png" alt="">
                    <img class="kitchen" src="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/images/Bep.png" alt="">
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
                        <div name="${row}A"><img src="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/images/icon-premium-seat0.png" alt=""></div>
                    </td>
                    <td>
                        <div name="${row}B"><img src="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/images/icon-premium-seat0.png" alt=""></div>
                    </td>
                     <td>
                     $row
                    </td>
                     <td>
                         <div name="${row}C"><img src="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/images/icon-premium-seat0.png" alt=""></div>
                    </td>
                     <td>
                         <div name="${row}D"><img src="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/images/icon-premium-seat0.png" alt=""></div>
                    </td>
    </tr>
    EOT;
                    }
                    ?>
                </table>
            </div>
            <div>
                <table class="economy-class">
                    <img class="left-exit" src="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/images/loi%20ra%20trai.jpg" alt="">
                    <img class="right-exit" src="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/images/Loi%20ra%20phai.jpg" alt="">
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
                        <div name="${row}A"><img src="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/images/icon-premium-seat2.png" alt=""></div>
                    </td>
                    <td>
                        <div name="${row}B"><img src="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/images/icon-premium-seat2.png" alt=""></div>
                    </td>
                     <td>
                        <div name="${row}C"><img src="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/images/icon-premium-seat2.png" alt=""></div>
                    </td>
                    <td>
                    $row
                    </td>
                    <td>
                        <div name="${row}D"><img src="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/images/icon-premium-seat2.png" alt=""></div>
                    </td>
                    <td>
                        <div name="${row}E"><img src="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/images/icon-premium-seat2.png" alt=""></div>
                    </td>
                    <td>
                        <div name="${row}G"><img src="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/images/icon-premium-seat2.png" alt=""></div>
                    </td>
    </tr>
    EOT;
                    }
                    ?>
                </table>
            </div>
            <div>
                <table class="economy-class">
                    <img class="left-exit" src="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/images/loi%20ra%20trai.jpg" alt="">
                    <img class="right-exit" src="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/images/Loi%20ra%20phai.jpg" alt="">
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
                        <div name="${row}A"><img src="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/images/icon-premium-seat2.png" alt=""></div>
                    </td>
                    <td>
                        <div name="${row}B"><img src="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/images/icon-premium-seat2.png" alt=""></div>
                    </td>
                     <td>
                        <div name="${row}C"><img src="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/images/icon-premium-seat2.png" alt=""></div>
                    </td>
                    <td>
                    $row
                    </td>
                    <td>
                        <div name="${row}D"><img src="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/images/icon-premium-seat2.png" alt=""></div>
                    </td>
                    <td>
                        <div name="${row}E"><img src="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/images/icon-premium-seat2.png" alt=""></div>
                    </td>
                    <td>
                        <div name="${row}G"><img src="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/images/icon-premium-seat2.png" alt=""></div>
                    </td>
    </tr>
    EOT;
                    }
                    ?>
                </table>
            </div>
            <table class="economy-class">
                <img class="left-exit" src="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/images/loi%20ra%20trai.jpg" alt="">
                <img class="right-exit" src="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/images/Loi%20ra%20phai.jpg" alt="">
                <img class="labotory" src="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/images/PhongVeSinh.png" alt="">
                <img class="kitchen" src="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/images/Bep.png" alt="">
            </table>

        </div>
    </div>
</div>
</body>
</html>
