<!DOCTYPE html>
<?php
if(isset($_POST['string']) && isset($_POST['operation'])) {
    $stringValue = $_POST['string'];
    $operation = $_POST['operation'];

    $result = 'something is wrong';

    if($operation == 'palindrome') {
        if($stringValue == strrev($stringValue)) {
            $result = "{$stringValue} is a palindrome!";
        }
        else {
            $result = "{$stringValue} is not a palindrome!";
        }
    }
    else if($operation == 'reverse') {
        $result = strrev($stringValue);
    }
    else if($operation == 'split') {
        $array = str_split($stringValue);
        $array = array_filter($array, function($val) {
            if($val == ' ') {
                return false;
            }
            return true;
        });
        $result = implode($array, ' ');
    }
    else if($operation == 'hash') {
        $result = crypt($stringValue);
    }
    else if($operation == 'shuffle') {
        $result = str_shuffle($stringValue);
    }
}
?>
<html>
<head>
    <title>Modify String</title>
</head>
<body>
<form action="" method="post">
    <input type="text" name="string" id="input-string"/>
    <input type="radio" name="operation" value="palindrome" id="palindrome-button"/>
    <label for="palindrome-button">Check Palindrome</label>
    <input type="radio" name="operation" value="reverse" id="reverse-button"/>
    <label for="reverse-button">Reverse String</label>
    <input type="radio" name="operation" value="split" id="split-button"/>
    <label for="split-button">Split</label>
    <input type="radio" name="operation" value="hash" id="hash-button"/>
    <label for="hash-button">Hash String</label>
    <input type="radio" name="operation" value="shuffle" id="shuffle-button"/>
    <label for="shuffle-button">Shuffle String</label>
    <input type="submit" name="submitOperation" value="Submit"/>
</form>
<div id="result">
    <?php
    if(isset($result)) {
        echo $result;
    }
    ?>
</div>
</body>
</html>