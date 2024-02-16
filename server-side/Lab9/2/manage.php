<?php
    include './database.php';

    $oldid = $_POST['oldid'];
    $id = $_POST['id'];
    $name = $_POST['name'];
    $dept_name = $_POST['dept_name'];
    $tot_credit = $_POST['tot_cred'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($_POST['action'] == 'update') {
            // echo $oldid;
            $sqlUpdate = $conn->prepare("UPDATE student 
                        SET ID = '{$id}', name = '{$name}', 
                            dept_name = '{$dept_name}', 
                            tot_cred = '{$tot_credit}'
                        WHERE ID = '{$oldid}'");
            // $setting = $conn->prepare($sqlUpdate);
            $sqlUpdate->execute();
            echo '<script>window.location.href = "./index.php"</script>';
        } 
        elseif ($_POST['action'] == 'delete') {
            $sqlDelete = $conn->prepare("DELETE FROM student WHERE ID = '{$oldid}'");
            $sqlDelete->execute();
            echo '<script>window.location.href = "./index.php"</script>';
        }
    }
?>