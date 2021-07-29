<?php
$servername = "localhost";
$username = "methodp1_1";
$password = "Alireza79";
$dbname = "methodp1_mainDatabse";

$conn = new mysqli($servername, $username, $password, $dbname);

$channel = $_GET['channel'];
$author = $_GET['author'];
$text = $_GET['text'];
$date = $_GET['date'];

$sql = "INSERT INTO `$channel` (`author`, `text`, `date`, `likes`, `status`) VALUES ('$author', '$text', '$date', 0, 1)";
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
