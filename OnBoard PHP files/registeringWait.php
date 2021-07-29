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

$sql = "INSERT INTO `registering` VALUES ('$firstname', '$lastname', '$username', '$password', '$channel')";
$result = $conn->query($sql);

$channel .= "_notif";

$sql = "INSERT INTO `$channel` (`title`, `message`, `mode`, `status`) VALUES ('Admin registering', 'A new user requests to be an admin for this channel.\n First name: $firstname \nLastname: $lastname \nUsername: $username\n\n Do you accept?', 10, 1)";
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
