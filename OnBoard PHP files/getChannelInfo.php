<?php
$servername = "localhost";
$username = "methodp1_1";
$password = "Alireza79";
$dbname = "methodp1_mainDatabse";

$conn = new mysqli($servername, $username, $password, $dbname);

$name = $_GET['name'];

$sql = "SELECT * FROM channels
  WHERE name = '$name'";
$result = $conn->query($sql);

$array = array();
for($i = 0; $i < $result->num_rows; $i++){
  $array[$i] = $result -> fetch_assoc();
}

$jsonEncode = json_encode($array);
print($jsonEncode);

$conn->close();
?>
