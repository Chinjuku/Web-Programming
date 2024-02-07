<?php

use function PHPSTORM_META\type;

    $data = array(
    "name" => $_POST['name'],
    "address" => $_POST['address'],
    "age" => intval($_POST['age']),
    "profession" => $_POST['profession'],
    "resident" => $_POST['resident'],
    );
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Your form data</h1>
    <div style="color : blue">
    <?php
        foreach($data as $key => $value) {
            if(strlen($value) < 5 && gettype($value) == 'string' ) {
                echo '<div><p style="color: red;">' . "Your ". $key . " is : " . $value . '</p></div>';
            }
            else {
                echo '<div><p>' . "Your ". $key . " is : " . $value . '</p></div>';
            }
        }
    ?>
    </div>
    <button onclick="window.location.href = './index.html'">Back</button>
</body>
</html>