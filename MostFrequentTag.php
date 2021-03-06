
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Most Frequent Tag</title>
</head>
<body>
<p>Enter Tags:</p>

<form action="" method="get">
    <input type="text" name="tags" autofocus/>
    <input type="submit"/><br/><br/>
</form>

<?php
if ($_GET) {
    if ($_GET['tags'] != '') {
        //split the string
        $tags = explode(', ', $_GET['tags']);

        //find all keys and their frequency
        $occurrences = array_count_values($tags);

        // reversed sort of the array with keys keeping
        arsort($occurrences);
        foreach ($occurrences as $key => $value) {
            echo "$key : $value times" . '<br>';
        }
        echo '<br>';

        //return all keys as value
        $keys = array_keys($occurrences);
        //check if all values are equal
        if (count(array_unique($occurrences)) == 1) {
            echo 'No Most Frequent Tag exist';
        } else {
            echo "Most Frequent Tag is: $keys[0]";
        }
    }
}
?>

</body>
</html>