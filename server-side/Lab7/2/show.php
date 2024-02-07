<?php 
    $getmonth = intval($_POST['month']);
    $daymonth = array(
        1 => array(31, 0, "January"),
        2 => array(29, 3, "Febuary"),
        3 => array(31, 4, "March"),
        4 => array(30, 0, "Apirl"),
        5 => array(31, 2, "May"),
        6 => array(30, 5, "June"),
        7 => array(31, 0, "July"),
        8 => array(31, 3, "August"),
        9 => array(30, 6, "September"),
        10 => array(31, 1, "October"),
        11 => array(30, 4, "November"),
        12 => array(31, 6, "December"),
    );
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
    <style>
        table, th, td, tr {
            border: black 2px solid;
        }
    </style>
</head>
<body class="h-screen w-full items-center flex justify-center flex-col">
<h1 class="text-3xl text-bold mb-[20px] text-blue-600">
    <?php
        foreach($daymonth as $key => $value) {
            if ($key == $getmonth) {
                echo $value[2];
            }
        }
    ?>
     in 2024
</h1>
<table class="w-[300px] h-[400px] text-center font-mono bg-green-100">
        <tr class="text-red-700">
            <?php
                $days = array("Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun");
                foreach ($days as $day) {
                    echo '<th>' . $day . '</th>';
                }
            ?>
        </tr>
        <?php
            function loop($first, $last, $count) {
                if($last > 28) {
                    if(($last - $first) > 6) {
                        echo '<tr>';
                        $gern = $last - $first - 6;
                        while ($first <= $last-$gern){
                            echo '<td>' . $first . '</td>';
                            $first++;
                        }
                        echo '</tr>';
                        echo '<tr>';
                        for ($i = $last-$gern+1; $i <= $last; $i++) {
                            echo '<td>' . $i . '</td>';
                        }
                        $spacelast = 7 - $gern;
                        for ($i = 0 ; $i < $spacelast; $i++) {
                            echo '<td>  </td>';
                        }
                        echo '</tr>';
                    } else {
                        for ($i = $first; $i <= $last; $i++) {
                            echo '<td>' . $i . '</td>';
                        }
                        $spacelast = 7 - ($last - $first);
                        for ($i = 1; $i < $spacelast; $i++) {
                            echo '<td> </td>';
                        }

                    }
                }
                else {
                    echo '<tr>';
                    if ($count > 0 && $first == 1) {
                        for ($i = 1 ; $i <= $count; $i++) {
                            echo '<td>' . " " . '</td>';
                        }
                        for ($i = $first; $i <= $last - $count; $i++) {
                            echo '<td>' . $i . '</td>';
                        }
                    } else {
                        for ($i = $first - $count; $i <= $last - $count; $i++) {
                            echo '<td>' . $i . '</td>';
                        }
                    }
                echo '</tr>';
                }
            }
            foreach( $daymonth as $month => $days) {
                $count = intval($days[1]);
                if ($month == $getmonth) {
                    loop(1, 7, $days[1], $days[0]);
                    loop(8, 14, $days[1], $days[0]);
                    loop(15, 21, $days[1], $days[0]);
                    loop(22, 28, $days[1], $days[0]);
                    loop(29-$count, $days[0], $days[1]);
                }
            }
        ?>
    </table>
    <button onclick="window.location.href = './index.html'" class="px-[25px] py-[10px] border border-black bg-blue-100 rounded-xl mt-[20px] hover:bg-blue-600 hover:text-white">Back</button>
</body>
</html>