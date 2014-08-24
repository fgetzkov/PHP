<DOCTYPE html>
    <html>
    <head><meta charset="utf-8"> </head>
    <body>
    <form method="get">
        Input :)
        <input type="text" name="numbers">
        <input type="submit" value="Дай ГАЗ!">
    </form>
    <table border="1">
    <?php
    if(isset($_GET['numbers']) && !empty($_GET['numbers']))
    {
        $numbers=explode(',',$_GET['numbers']);
        for($i=0;$i<count($numbers);$i++){

            $sum=array_sum(str_split($numbers[$i]));
            echo '<tr><td>'.$numbers[$i].'</td>';
            if(is_numeric($numbers[$i])==true){
                echo '<td>'.$sum.'</td></tr>';
            }
            else{
                echo '<td>'."no number".'</td></tr>';
            }

        }
    }
    ?>
    </table>
    </body>
    </html>