<?php
$servername = "localhost";
$username = "methodp1_1";
$password = "Alireza79";
$dbname = "methodp1_mainDatabse";

$conn = new mysqli($servername, $username, $password, $dbname);

$channel = $_GET['channel'];
$channel = $channel + "_notif";

$sql = "SELECT title, message, mode FROM $channel
  WHERE status = 1";
$result = $conn->query($sql);

$array = array();
for($i = 0; $i < $result->num_rows; $i++){
  $array[$i] = $result -> fetch_assoc();
}

$jsonEncode = json_encode($array);
print($jsonEncode);

$conn->close();
?>
