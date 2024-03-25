<?php
    // session_start();
    if(!isset($_SESSION['user_id'])){
        header('Location:./login.php');
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        session_start();
        session_destroy();
        header('Location:./login.php');
    }
?>
<!-- <a href="./index.php">back</a> -->
<form action="" method="post" class="bg-white px-4 rounded-lg hover:bg-gray-200 py-2" >
    <button type="submit">logout</button>
</form>
