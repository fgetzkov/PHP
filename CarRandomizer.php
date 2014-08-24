
<!DOCTYPE html>
<html>
<head></head>
<body>
<form method="get" action="">Enter cars
<input type="text" name="cars">
<input type="submit" value="Show result">
</form>
<table border="1">
    <tr><td>Cars</td><td>Color</td><td>Count</td></tr>
    <?php
    if( isset( $_GET['cars'])) :

        $colors=array("red","yellow","blue","black","white","green","orange");
    $random_keys=array_rand($colors,7);
    $carsSplit=explode(',',$_GET['cars']);
    $arrCars=array_count_values($carsSplit);
    arsort($arrCars);


    for($i=0;$i<sizeof($carsSplit);$i++):?>
        <tr><td>
    <?=$carsSplit[$i]?> </td> <td> <?=$colors[rand(0, 6)] ?> </td><td> <?=rand(1, 5) ?> </td></tr>
    <?php endfor; ?>
    <?php endif;?>
</table>
</body>
</html>