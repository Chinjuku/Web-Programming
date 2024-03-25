<?php
    echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">';
    echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>';
    // $json = json_decode(file_get_contents('http://10.0.15.21/lab/lab12/restapis/products.php'));
    $url = "http://10.0.15.21/lab/lab12/restapis/products.php";
    $response = file_get_contents($url);
    $result = json_decode($response);
    echo "<table class='container table'>
            <tr>
                <th scope='col'>ProductID</th>
                <th scope='col'>ProductCode</th>
                <th scope='col'>ProductName</th>
                <th scope='col'>Description</th>
                <th scope='col'>UnitPrice</th>
            </tr>
            <tbody>
          ";
    foreach($result as $key => $values){
        echo  "<tr>";
        echo  "<td scope='row'>" . $values->ProductID ."</td>";
        echo  "<td>" . $values->ProductCode ."</td>";
        echo  "<td>" . $values->ProductName ."</td>";
        echo  "<td>" . $values->Description ."</td>";
        echo  "<td>" . $values->UnitPrice ."</td>";
        echo  "</tr>";
    }
    echo  "</tbody>
            </table>";
?>