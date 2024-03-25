<?php
    include './database.php';
    session_start();
    if (!isset($_SESSION['user_id']) || !isset($_SESSION['username']) || !isset($_SESSION['user_fullname'])){
        header("Location: login.php");
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo '<script>alert("คุณจะลบใช่มั้ย")</script>';
        $sql = "DELETE FROM users WHERE user_id = '{$_POST['row']}'";
        $ret = $db->exec($sql);
        // $db->close();
        echo "ลบข้อมูลเรียบร้อย";
    }  
?>
<a href="./index.php">back</a>
<table>
    <tr>
        <th>
            ID
        </th>
        <th>
            Username
        </th>
        <th>
            FullName
        </th>
        <th>
            Delete
        </th>
    </tr>
    <?php
        $sql = "SELECT * FROM users";
        $ret = $db->query($sql);
        while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
            echo "<tr>";
            echo "<td>". $row['user_id'] ."</td>";
            echo "<td>". $row['username'] ."</td>";
            echo "<td>". $row['user_fullname'] ."</td>";
            echo "<td>
                <form method='post'>
                    <input type='hidden' name='row' value='". $row['user_id'] ."'/>
                    <button type='submit'>Delete Data</button>
                </form>
                </td>";
        }

    ?>
</table>