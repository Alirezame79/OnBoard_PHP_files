<?php
$servername = "localhost";
$username = "methodp1_1";
$password = "Alireza79";
$dbname = "methodp1_mainDatabse";

$conn = new mysqli($servername, $username, $password, $dbname);

$channel = $_GET['channel'];
$address = $_GET['address'];

$sql = "SELECT * FROM `channels`
  WHERE name = '$channel' AND address = '$address'";
$result = $conn->query($sql);

$array = array();
for($i = 0; $i < $result->num_rows; $i++){
  $array[$i] = $result -> fetch_assoc();
}

$jsonEncode = json_encode($array);
print($jsonEncode);

$conn->close();
 ?>
