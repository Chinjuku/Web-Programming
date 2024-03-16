<?php
    $url = "http://10.0.15.21/lab/lab12/restapis/10countries.json";
    $json = json_decode(file_get_contents($url));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php foreach ($json as $key => $value) {
        echo '<div class="flex p-[20px] border-[4px] border-green-300 bg-green-100"><div class="w-1/2">';
        echo '<p> Name : ' . $value->name . '</p>';
        echo '<p> Capital : ' . $value->capital . '</p>';
        echo '<p> Population : ' . $value->population . '</p>';
        echo '<p> Location : ' . $value->latlng[0] . " " . $value->latlng[1] . '</p>';
        echo '<p> Border : ';
        foreach ($value->borders as $border) {
            echo $border, " ";
        }
        echo ' </p>';
        echo '</div>
                <div class="w-1/2">';
        echo '<div class=""><img class="w-[50%] border border-black" src="' . $value->flag . '" alt="" /></div></div></div>';
    }
    ?>
</body>

</html>