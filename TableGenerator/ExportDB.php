<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users_db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM Users";
$result = mysqli_query($conn, $sql);
$data = array();
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

    	$data[] = $row;
    }
 }else {
    echo "0 results";
}
//echo json_encode($data);
 $dataJson = json_encode(array('title'=>$data));
echo $dataJson;
mysqli_close($conn);
?>