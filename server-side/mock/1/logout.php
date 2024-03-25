<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        session_start();
        session_destroy();
        header('Location:./login.php');
    }
?>
<!-- <a href="./index.php">back</a> -->
<form action="" method="post">
    <button type="submit">logout</button>
</form>
