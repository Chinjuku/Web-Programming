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
<body class="bg-sky-200" style="
    display: flex;
    flex-direction:column;
    flex-wrap: wrap; 
    justify-content: center; 
    align-items: center; 
    height: 100vh;">
    <form method="get" style="
        display: flex; 
        flex-direction: column;
        width: 400px;  
        font-size: 28px;
        gap: 10px;
        align-items: center;
        ">
        <label for="">Choose your month in 2024</label>
        <select name="month" id="" style="
        width: 40%;
        font-size: large;
        padding: 5px 10px;
        " class="outline-none hover:bg-green-200 p-[10px] bg-sky-100 border border-black rounded-md">
            <option value="1">January</option>
            <option value="2">Febuary</option>
            <option value="3">March</option>
            <option value="4">April</option>
            <option value="5">May</option>
            <option value="6">June</option>
            <option value="7">July</option>
            <option value="8">August</option>
            <option value="9">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
        </select>
        <button type="submit" style="width: 40%; 
        background-color: chocolate;
        cursor: pointer;" class="scale-[0.6] hover:scale-[0.75] transition-all">Submit</button>
    </form>
    
    <?php
            error_reporting(E_ERROR | E_PARSE);
            $getmonth = intval($_GET['month']);
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
            if(isset($_GET['month'])){
                foreach($daymonth as $key => $value) {
                    if ($key == $getmonth) {
                        echo '<h1 class="text-2xl text-sky-500 my-[15px] font-bold">' . $value[2] . ' in 2024</h1>';
                    }
                }
                echo '<table class="w-[320px] h-[280px] text-center font-mono bg-green-100">';
                echo '<tr class="text-red-700">';
                $days = array("Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun");
                foreach ($days as $day) {
                    echo '<th>' . $day . '</th>';
                }
                echo '</tr>';
            }
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
            echo '</table>';
        ?>
    
</body>
</html>