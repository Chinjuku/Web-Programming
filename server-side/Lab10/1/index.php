<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        @font-face {
            font-family: candy;
            src: url(EmilysCandy-Regular.ttf);
        }
        body {
            font-family: candy;
        }
        .table-striped > tbody > tr:nth-child(2n+1) > td, .table-striped > tbody > tr:nth-child(2n+1) > th {
            background-color: #ffcccc;
        }
        .table-striped > tbody > tr:nth-child(2n) > td, .table-striped > tbody > tr:nth-child(2n) > th {
            background-color: hsl(180, 100%, 70%);
        }
    </style>
</head>
<body>
<h1 class="text-center mt-4">Customers Data</h1>
<div class="container">
    <table class="table my-3 table-striped table-hover table-responsive">
        <thead class="table-dark">
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
        include './database.php';
        $sqlshow = $sql ="SELECT * FROM customers;";
        $ret = $db->query($sql);   
     
        while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
           echo "<tr>";
           echo "<td>". $row['CustomerId'] . "</td>";
           echo "<td>". $row['FirstName'] . " " . $row['LastName'] . "</td>"; 
           echo "<td>". $row['Address']  . "</td>";
           echo "<td>". $row['Phone']. "</td>";
           echo "<td>". $row['Email']. "</td>"; 
           echo "</tr>";
        }
        // $db->close();
    ?>
        </tbody>
    </table>
    <form action="./delete.php" method="post">
        <button type="submit" name="del" value="del" class="btn btn-warning mx-4 mb-5">Delete last row</button>
    </form>
</div>

</body>
</html>