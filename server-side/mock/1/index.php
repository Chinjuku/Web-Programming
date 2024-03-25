<?php
    include './database.php';
    session_start();
    if (!isset($_SESSION['user_id']) || !isset($_SESSION['username']) || !isset($_SESSION['user_fullname'])){
        header("Location: login.php");
    }
    include './logout.php';

?>
<a href="./manage.php">manage data</a>
<h1>home</h1>
<p>ID : <?php echo $_SESSION['user_id'] ?></p>
<p>Username : <?php echo $_SESSION['username'] ?></p>
<p>Fullname : <?php echo $_SESSION['user_fullname'] ?></p>