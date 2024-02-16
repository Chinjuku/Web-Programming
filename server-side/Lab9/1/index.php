<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        error_reporting(E_ERROR | E_PARSE);
        $record = intval($_GET['record']);
        $conn = mysqli_connect("localhost", "S052M", 'TH60375', "s052m");
        // $conn = mysqli_connect("localhost", "root", "", "webpro", 3306);
        if ($conn->connect_error) {
            die("Connection failed: ". $conn->connect_error);
        }
        else {
            $sql = "SELECT * FROM student";
            
        }
        $result = $conn->query($sql);
        $count = 0;
        while ($row = $result->fetch_assoc()) {
            $count++;
            if ($count == $record) {
                ?> <div style="display: flex; margin: 8px 0;"><div>ID : </div> <?php echo '<div>'. $row['ID'] .' </div></div>';
                ?> <div style="display: flex; margin: 8px 0;"><div>Name : </div> <?php echo '<div>'. $row['name'] .'</div></div>';
                ?> <div style="display: flex; margin: 8px 0;"><div>Department name : </div> <?php echo '<div>'. $row['dept_name'] .'</div></div>';
                ?> <div style="display: flex; margin: 8px 0;"><div>Total Credits : </div> <?php echo '<div>'. $row['tot_cred'] .'</div></div>';
            }
        }
    ?>
    
    <form action="" method="get">
        <p>
            <label for="record">Record</label>
            <input type="number" id="record" name="record" onchange="this.submit()" value="7">
        </p>
        <button type="submit">Display</button>
    </form>
    
</body>
</html>