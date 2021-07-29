<?php
$servername = "localhost";
$username = "methodp1_1";
$password = "Alireza79";
$dbname = "methodp1_mainDatabse";

$conn = new mysqli($servername, $username, $password, $dbname);

$username = $_GET['username'];
$password = $_GET['password'];
$channel = $_GET['channel'];

$sql = "INSERT INTO members (`username`, `password`, `channel`) VALUES ('$username', '$password', '$channel')";
$result = $conn->query($sql);

$sql2 = "UPDATE channels SET memberCount = memberCount + 1 WHERE name = '$channel'";
$result2 = $conn->query($sql2);

$array = array();
for($i = 0; $i < $result->num_rows; $i++){
  $array[$i] = $result -> fetch_assoc();
}

$jsonEncode = json_encode($array);
print($jsonEncode);

$conn->close();
 ?>
