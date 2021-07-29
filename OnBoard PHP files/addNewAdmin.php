<?php
$servername = "localhost";
$username = "methodp1_1";
$password = "Alireza79";
$dbname = "methodp1_mainDatabse";

$conn = new mysqli($servername, $username, $password, $dbname);

$username = $_GET['username'];
$channel = $_GET['channel'];
$message = $_GET['message'];

$sql = "INSERT INTO admins (`firstname`, `lastname`, `username`, `password`, `channel`) SELECT firstname, lastname, username, password, channel FROM `registering` WHERE username = '$username' AND channel = '$channel'";
$result = $conn->query($sql);

$channel .= "_notif";
$sql2 = "UPDATE $channel SET status = 0 WHERE message = '$message'";
$result2 = $conn->query($sql2);

$sql3 = "UPDATE registering SET status = 1 WHERE username = '$username'";
$result3 = $conn->query($sql3);

$array = array();
for($i = 0; $i < $result->num_rows; $i++){
  $array[$i] = $result -> fetch_assoc();
}

$jsonEncode = json_encode($array);
print($jsonEncode);

$conn->commit();
$conn->close();
?>
