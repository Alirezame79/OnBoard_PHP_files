<?php

    $name = $_GET['name'];
    $image = $_GET['image'];

    $decodeImage = base64_decode("$image");
    file_put_contents("OnBoard/registerImage/" . $name . ".JPG", $decodeImage);

?>
