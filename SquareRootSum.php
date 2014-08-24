
<!DOCTYPE html>
    <html>
<head></head>
<body>
<table border="1px">
    <tr>
    <td><b>Number</b></td>
    <td><b>Square</b></td>
    </tr>
    <?php $result=0; ?>
    <?php
    for($i=0;$i<=100;$i=$i+2):?>
        <tr>
            <td><b><?= $i?></b></td>
            <td><b><?= (float)(number_format(sqrt($i),2))?></b></td>
            <?php  $result=$result+sqrt($i);?>
        </tr>
    <?php  endfor; ?>
      <tr>
      <td><b>Total:</b></td>
      <td><b><?=number_format( $result,2)?></b></td>
      </tr>
</table>


</body>
    </html>