<?php
$servername = "localhost";
$username = "methodp1_1";
$password = "Alireza79";
$dbname = "methodp1_mainDatabse";

$conn = new mysqli($servername, $username, $password, $dbname);

$username = $_GET['username'];
$channel = $_GET['channel'];
$message = $_GET['message'];

$channel .= "_notif";
$sql = "UPDATE $channel SET status = 0 WHERE message = '$message'";
$result = $conn->query($sql);

$sql2 = "UPDATE registering SET status = 0 WHERE username = '$username'";
$result2 = $conn->query($sql2);

$array = array();
for($i = 0; $i < $result->num_rows; $i++){
  $array[$i] = $result -> fetch_assoc();
}

$jsonEncode = json_encode($array);
print($jsonEncode);

$conn->commit();
$conn->close();
?>
