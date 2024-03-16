<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header('Location:./login.php');
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        session_start();
        session_destroy();
        header('Location:./login.php');
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
    <form action="" method="post">
        <button type="submit">logout</button>
    </form>
</body>
</html>