<!DOCTYPE HTML>
    <html>
<head></head>
<body>
<form method="post" action="">
    Enter Amount
    <input type="text" name="money"><br>
    <input type="radio" name="currency" value="$"> USD
    <input type="radio" name="currency" value="EURO"> EUR
    <input type="radio" name="currency" value="lv"> BNG <br>
    Compound Interest Amount
    <input type="text" name="compoundInterest"><br>
    <select name="period">
        <option value="6mnts">6 Months</option>
        <option value="12mnts">1 Year</option>
        <option value="24mnts">2 Years</option>
        <option value="60mnts">5 Years</option>
    </select>
    <input type="submit" name="submint" value="Calculate" placeholder="Calculate">
</form>
</body>
    </html>
<?php
/**
 * Created by PhpStorm.
 * User: philip
 * Date: 14-8-20
 * Time: 13:56
 */
if (isset($_POST["money"])){
    $i=0;
    $moneyEnd=0;
    $money=$_POST["money"];
    $amount=$_POST["compoundInterest"];
    $period=$_POST["period"];
    $castAmount=(intval($amount))/12;
    $castPeriod=intval($period);

    while($i<$castPeriod){

    $moneyEnd=$money*(1+($castAmount/100));
        $money=$moneyEnd;
        $i++;
   }

}
echo($_POST["currency"]);
echo round($moneyEnd, 2);
?>
