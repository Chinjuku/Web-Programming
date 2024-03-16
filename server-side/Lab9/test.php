<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>lab9-1</title>
</head>
<body>
<form id="CourseForm" method="post">
    <div class="form-group">
            <p><label for='CourseID'>Course ID:</label>
                <input class="form-control" type="text" id="CourseID" name="CourseID" size="7" />
            </p>
            <p><label for='CourseTitle'>Title:</label>
                <input class="form-control" type="text" id="CourseTitle" name="CourseTitle" size="25" />
            </p>
            <p><label for='DeptName'>Department Name:</label>
                <input class="form-control" type="text" id="DeptName" name="DeptName" />
            </p>
            <p><label for='Credits'>Credits:</label>
                <input class="form-control" type="text" id="Credits" name="Credits" size="3" />
            </p>
            <input type="submit" name="action" value="Update">
            <input type="submit" name="action" value="Delete">    
    </div>
</form>

<table class="table">
    <tr>
        <th>Course ID</th>
        <th>Title</th>
        <th>Dept. Name</th>
        <th>Credits</th>
    </tr>
    <?php
        $servername = "localhost";
        $username = "root"; //ตามที่กำหนดให้
        $password = ""; //ตามที่กำหนดให้
        $dbname = "webpro";    //ตามที่กำหนดให้
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        }


        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $action = $_POST["action"];
            $course_id = $_POST["CourseID"];
            $title = $_POST["CourseTitle"];
            $dept_name = $_POST["DeptName"];
            $credits = $_POST["Credits"];

            if($action == "Update"){
                $sqlup = $conn->prepare("UPDATE course SET title='$title', dept_name='$dept_name', credits='$credits' where course_id='$course_id'");
                $sqlup->execute();
            }elseif($action == "Delete"){
                $sqldel = $conn->prepare("DELETE FROM course WHERE course_id ='$course_id'");
                $sqldel->execute();

            }

            
        }


        $sql = "SELECT * FROM course;";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td><button onclick=\"clickkkk('".$row["course_id"]."','".$row["title"]."','".$row["dept_name"]."','".$row["credits"]."')\">" . $row["course_id"]. "</button></td><td>" . $row["title"]. 
            "</td><td>" . $row["dept_name"] . "</td><td>" . $row["credits"] . "</td></tr>";
        }
        } else {
        echo "0 results";
        }

        // close connection
        mysqli_close($conn);
        ?>
</table>

<script>
    function clickkkk(id,title,dept,credit){
        document.getElementById("CourseID").value = id;
        document.getElementById("CourseTitle").value = title;
        document.getElementById("DeptName").value = dept;
        document.getElementById("Credits").value = credit;
    }

</script>
    
</body>
</html>