<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td {
            border-bottom: 1px solid black;
            font-size: 18px;
            color: blue;
            padding:  8px 10px;
        }
        tr {
            border-bottom: 1px solid black;
        }
        table, tr, td {
            border-collapse: none;
        }
        input, button {
            padding: 5px 10px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <!-- action="./index.php" id="cals" -->
    <form method="post">
        <input name="cals" id="cals" type="number" required />
        <button name="submit" type="submit">Submit</button>
    </form>
    <div>
        <h1><?php echo 'แสดงตารางสูตรคูณแม่ ' . $_POST["cals"] ?></h1>
        <table style="width: 300px; font-size:18px;">
            <?php
                if($_SERVER['REQUEST_METHOD'] === 'POST') {
                    if(!isset($_POST["cals"])) {
                        echo '<script>alert("Error!")</script>';
                    }
                    else {
                    $cals = $_POST["cals"];
                    for ($i = 1; $i<=12; $i++) {    
                        ?> 
                    <tr class="tablerow"> 
                    <?php
                        echo '<td>' . $cals  . '</td>';
                        echo '<td>*</td>';
                        echo '<td>' . $i  . '</td>';
                        echo '<td> = </td>';
                        echo '<td>' . $cals * $i  . '</td>';
                        echo '</tr>'; 
                        }
                    }
                }
                ?>
                
        </table>
    </div>
</body>
</html>