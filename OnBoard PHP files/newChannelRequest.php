<?php
$servername = "localhost";
$username = "methodp1_1";
$password = "Alireza79";
$dbname = "methodp1_mainDatabse";

$conn = new mysqli($servername, $username, $password, $dbname);

$firstname = $_GET['firstname'];
$lastname = $_GET['lastname'];
$username = $_GET['username'];
$password = $_GET['password'];
$channel = $_GET['channel'];

// not finished

$sql = "CREATE TABLE `$channel` (`id` int, `message`, `mode`, `status`);
$result = $conn->query($sql);

$array = array();
for($i = 0; $i < $result->num_rows; $i++){
  $array[$i] = $result -> fetch_assoc();
}

$jsonEncode = json_encode($array);
print($jsonEncode);

$conn->commit();
$conn->close();
?>
