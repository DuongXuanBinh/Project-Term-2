<?php
for ($i=1;$i<=30;$i++){
    if($i<=7){
        echo <<<OOO
[
'seat_location'=>'$i.A',
'class_id'=>2,
'plane_id'=>3
],<br>
[
'seat_location'=>'$i.B',
'class_id'=>2,
'plane_id'=>3
],<br>
[
'seat_location'=>'$i.C',
'class_id'=>2,
'plane_id'=>3
],<br>
[
'seat_location'=>'$i.D',
'class_id'=>2,
'plane_id'=>3
],<br>
OOO;
    }else{
        echo <<<PPP
[
'seat_location'=>'$i.A',
'class_id'=>1,
'plane_id'=>3
],<br>
[
'seat_location'=>'$i.B',
'class_id'=>1,
'plane_id'=>3
],<br>
[
'seat_location'=>'$i.C',
'class_id'=>1,
'plane_id'=>3
],<br>
[
'seat_location'=>'$i.D',
'class_id'=>1,
'plane_id'=>3
],<br>
[
'seat_location'=>'$i.E',
'class_id'=>1,
'plane_id'=>3
],<br>
[
'seat_location'=>'$i.F',
'class_id'=>1,
'plane_id'=>3
],<br>
[
'seat_location'=>'$i.G',
'class_id'=>1,
'plane_id'=>3
],<br>
[
'seat_location'=>'$i.H',
'class_id'=>1,
'plane_id'=>3
],<br>
[
'seat_location'=>'$i.K',
'class_id'=>1,
'plane_id'=>3
],<br>
PPP;
    }

}

for ($i=114;$i<=161;$i++){
    $x = rand(20,99);
    $y = rand(10,30);
    $z = $x + $y;
    echo <<<OOOO
['flight_id'=>'HV.$i',
'class_id'=>1,
'price'=>$x
],<br>
['flight_id'=>'HV.$i',
'class_id'=>2,
'price'=>$z
],<br>
OOOO;

}
?>
