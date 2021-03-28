<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!--business-->
<div class="container">
<div class="row">
    <div class="col-3  seat-map">
        <table class="business-class">
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
                <tr class="one-digit">
                <td>
                    <input type="checkbox" name="${row}A" id="${row}A">   
                    <label for="${row}A">${row}A</label>   
                </td>
                <td>
                    <input type="checkbox" name="${row}B" id="${row}B">
                    <label for="${row}B">${row}B</label>   
                </td>
                 <td>
                 $row
                </td>
                 <td>
                    <input type="checkbox" name="${row}C" id="${row}C">
                    <label for="${row}C">${row}C</label>   
                </td>  
                 <td>
                    <input type="checkbox" name="${row}D" id="${row}D">
                    <label for="${row}D">${row}D</label>    
                </td>
</tr>
EOT;
            }
            ?>
        </table>
        <table class="economy-class">
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
            for ($row=5;$row<=9;$row++) {
                    echo <<<EOT
                <tr class="one-digit">
                <td>
                    <input type="checkbox" name="${row}A" id="${row}A">
                    <label for="${row}A">${row}A</label>   
                     
                </td>
                <td>
                    <input type="checkbox" name="${row}B" id="${row}B">
                    <label for="${row}B">${row}B</label>   
                </td>
                 <td>
                    <input type="checkbox" name="${row}C" id="${row}C">
                    <label for="${row}C">${row}C</label>    
                </td>  
                <td>
                $row
                </td>
                <td>
                    <input type="checkbox" name="${row}D" id="${row}D">
                    <label for="${row}D">${row}D</label>                
                </td>
                <td>
                    <input type="checkbox" name="${row}E" id="${row}E">
                    <label for="${row}E">${row}E</label>   
                     
                </td>
                <td>
                    <input type="checkbox" name="${row}G" id="${row}G">
                    <label for="${row}G">${row}G</label>     
                </td>
</tr>
EOT;
            }
                for ($row = 10; $row <= 15; $row++) {
                    echo <<<EOT
                <tr class="two-digit">
                <td>
                    <input type="checkbox" name="${row}A" id="${row}A">
                    <label for="${row}A">${row}A</label>   
                     
                </td>
                <td>
                    <input type="checkbox" name="${row}B" id="${row}B">
                    <label for="${row}B">${row}B</label>   
                </td>
                 <td>
                    <input type="checkbox" name="${row}C" id="${row}C">
                    <label for="${row}C">${row}C</label>    
                </td>  
                <td>
                $row
                </td>
                <td>
                    <input type="checkbox" name="${row}D" id="${row}D">
                    <label for="${row}D">${row}D</label>                
                </td>
                <td>
                    <input type="checkbox" name="${row}E" id="${row}E">
                    <label for="${row}E">${row}E</label>   
                     
                </td>
                <td>
                    <input type="checkbox" name="${row}G" id="${row}G">
                    <label for="${row}G">${row}G</label>     
                </td>
</tr>
EOT;
                }

            ?>
        </table>
        <table class="economy-class">
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
                <tr class="two-digit">
                <td>
                    <input type="checkbox" name="${row}A" id="${row}A">
                    <label for="${row}A">${row}A</label>   
                     
                </td>
                <td>
                    <input type="checkbox" name="${row}B" id="${row}B">
                    <label for="${row}B">${row}B</label>   
                </td>
                 <td>
                    <input type="checkbox" name="${row}C" id="${row}C">
                    <label for="${row}C">${row}C</label>    
                </td>  
                <td>
                $row
                </td>
                <td>
                    <input type="checkbox" name="${row}D" id="${row}D">
                    <label for="${row}D">${row}D</label>                
                </td>
                <td>
                    <input type="checkbox" name="${row}E" id="${row}E">
                    <label for="${row}E">${row}E</label>   
                     
                </td>
                <td>
                    <input type="checkbox" name="${row}G" id="${row}G">
                    <label for="${row}G">${row}G</label>     
                </td>
</tr>
EOT;
            }
            ?>
        </table>
    </div>
</div>
</div>
</body>
</html>