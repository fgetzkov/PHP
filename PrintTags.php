<!DOCTYPE HTML>
    <html>
    <head></head>
    <body>

    <p>Enter Tags:</p>
    <form method="get" action="">
    <input type="text" name="text">
    <input type="submit">
    </form>
    </body>
    </html>
    <?php
if (isset($_GET["text"])){
    $arr=explode(",",$_GET["text"]);
    for($i=0;$i<sizeof($arr);$i++){
        echo($i." : ");
        echo($arr[$i]."</br>");
    }
}

?>