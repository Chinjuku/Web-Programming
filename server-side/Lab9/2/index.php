<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <style>
        .hidebtn {
            background: transparent;
            border: none;
        }
    </style>
</head>
<body>
    <div class="container mt-3">
    <?php
        include './database.php';
        $getId = $_GET['getId'];
        if (isset($getId)) {
            $sqlSelect = "SELECT * FROM student WHERE ID = $getId;";
            $getResult = $conn->query($sqlSelect);
    ?> 
    <h1>Student Details</h1>
    <form action="manage.php" method="post">
        <?php while($data = $getResult->fetch_assoc()): ?>
            <input type="hidden" value="<?php echo $data['ID'] ?>" name="oldid">
        <p>
            <label for="">ID :</label>
            <input class="form-control my-2" type="text" id="id" name="id" value="<?php echo $data['ID']; ?>">
        </p>
        <p>
            <label for="">Name :</label>
            <input class="form-control my-2" type="text" id="name" name="name" value="<?php echo $data['name']; ?>">
        </p>
        <p>
            <label for="">Department name :</label>
            <input class="form-control my-2" type="text" id="dept_name" name="dept_name" value="<?php echo $data['dept_name']; ?>">
        </p>
        <p>
            <label for="">Total Credits :</label>
            <input class="form-control my-2" type="text" id="tot_cred" name="tot_cred" value="<?php echo $data['tot_cred']; ?>">
        </p>
        <?php endwhile; } else { ?>
            <h1>Student Details</h1>
            <p>
                <label for="">ID :</label>
                <input class="form-control my-2" type="text" id="id" name="id" value="<?php echo $data['ID']; ?>">
            </p>
            <p>
                <label for="">Name :</label>
                <input class="form-control my-2" type="text" id="name" name="name" value="<?php echo $data['name']; ?>">
            </p>
            <p>
                <label for="">Department name :</label>
                <input class="form-control my-2" type="text" id="dept_name" name="dept_name" value="<?php echo $data['dept_name']; ?>">
            </p>
            <p>
                <label for="">Total Credits :</label>
                <input class="form-control my-2" type="text" id="tot_cred" name="tot_cred" value="<?php echo $data['tot_cred']; ?>">
            </p>
        <?php }  ?>
        <div>
            <button class="btn btn-primary" name="action" value="update" type="submit">Update</button>
            <button class="btn btn-secondary" name="action" value="delete" type="submit">Delete</button>
        </div>
        
    </form>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Dept_name</th>
            <th scope="col">Total Credits</th>
            </tr>
        </thead>
        <tbody>
    <?php
        $sqlshow = "SELECT * FROM student";
        $show = $conn->query($sqlshow);
        while ($rowshow = $show->fetch_assoc()) {
            echo '<tr>';
            echo '<td><form method="get"><input type="hidden" value="'. $rowshow['ID'] .'" name="getId" "><button class="hidebtn" type="submit"><u>' . $rowshow['ID'] . '</u></button></form></td>';
            echo '<td>'. $rowshow['name']. '</td>';
            echo '<td>'. $rowshow['dept_name']. '</td>';
            echo '<td>'. $rowshow['tot_cred']. '</td>';
            echo '</tr>';           
        }
    ?>
        </tbody>
        </table>
    </div>
</body>
</html>