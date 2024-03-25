<?php
    echo '<script src="https://cdn.tailwindcss.com"></script>';
    echo '<div class="m-6">';
    echo '<p class="text-3xl font-bold">Product Details</p><br>';
    // error_reporting(E_ERROR | E_PARSE); //ข้าม error
    $products = json_decode(file_get_contents('http://10.0.15.21/lab/lab12/restapis/products.php'));
    $num = 0;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $pages = $_POST['num'];
        if($_POST['action'] == 'decrement'){
            $pages == 0 ? $num = $pages : $num = $pages - 1;
        }
        elseif ($_POST['action'] == 'increment'){
            $pages == 42 ? $num = $pages : $num = $pages + 1;
        }
    }
    echo '<form action="" method="post">';
    echo '<input type="hidden" name="num" value="'. $num .'" />';
    array('1' => 'one', '2' => 'chaaim');
    foreach ($products as $key => $product) {
        if($key == $num) {
            echo "<p class='text-xl'> ID : " . $product->ProductID . '</p>';
            echo "<p class='text-xl'> Code : ". $product->ProductCode. '</p>';
            echo "<p class='text-xl'> Name : ". $product->ProductName. '</p>';
            echo "<p class='text-xl'> Description : ". $product->Description. '</p>';
            echo "<p class='text-xl'> Price : ". $product->UnitPrice. '</p>';
        }
    }
    echo '<div class="flex gap-4 my-5 text-xl"><button class="bg-red-300 hover:bg-red-200 px-3 py-2 rounded-xl" name="action" value="decrement" type="submit">Previous</button>';
    echo '<button class="bg-blue-300 hover:bg-blue-200 px-3 py-2 rounded-xl" name="action" value="increment" type="submit">Next</button></div>';
    echo '</form>';
    echo '</div>';
?>

