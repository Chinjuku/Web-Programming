<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <title>Lab10.1</title>
    <style>
        @font-face {
            font-family: quicksand;
            src: url("Quicksand-VariableFont_wght.ttf");
        }
        body{
            font-family: quicksand;
            text-align: center;
        }
        

    </style>
</head>
<body>
    <form method="post">
        <table class="table-warning table container">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
            <?php
                // 1. Connect to Database 
                error_reporting(E_ERROR | E_PARSE);
                class MyDB extends SQLite3 {
                    function __construct() {
                        $this->open('customers.db');
                    }
                }

                // 2. Open Database 
                $db = new MyDB();
                if(!$db) {
                    echo $db->lastErrorMsg();
                }

                // 3. Query Execution
                $sql ="SELECT * from customers";
                $ret = $db->query($sql);   

                while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
                    echo "<tr>
                    <th scope='row'>". $row['CustomerId'] . "</th>
                    <td>".$row['FirstName']." ".$row['LastName'] ."</td>
                    <td>".$row['Address'] ."</td>
                    <td>".$row['Phone'] ."</td>
                    <td>".$row['Email'] ."</td>
                    </tr>";
                }
            ?>
            </tbody>
        </table>
        <input type="submit" name="deleterow" value="Delete last row"></input>
    </form>
    <?php
        // 4. Delete the last row
        if (isset($_POST['deleterow'])){
            $sql = <<<EOF
            DELETE FROM customers WHERE CustomerId = (SELECT MAX(CustomerId) FROM customers);
            EOF;
            $ret = $db->exec($sql);

            // header("Location: index.php");
        }
        
    ?>
</body>
</html>