<?php
    include './database.php';
    session_start();
    if(!isset($_SESSION['user_id'])){
        header('Location:./login.php');
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $sql = <<<EOF
                DELETE FROM users WHERE user_id = '{$_POST['row']}';
            EOF;
            $ret = $db->exec($sql);
            echo "ลบข้อมูลเรียบร้อย";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="./index.php">back</a>
    <p>Manage</p>
    <table>
        <tr>
            <th>
                ID
            </th>
            <th>
                Username
            </th>
            <th>
                Name
            </th>
            <th>
                Delete
            </th>
        </tr>
        <?php
            $sql ="SELECT * FROM users";
            $ret = $db->query($sql);
            while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
                echo "<tr>";
                echo "<td>". $row['user_id']. "</td>";
                echo "<td>". $row['user_name']. "</td>";
                echo "<td>". $row['name']. "</td>";
                echo "<td><form method='post'>
                        <input type='hidden' name='row' value='".$row['user_id']."'>
                        <button type='submit'>Delete user</button>
                    </form></td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>