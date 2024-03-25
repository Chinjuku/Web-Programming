<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
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
    <div>
        <?php include './logout.php'; ?>
        <a href="./manage.php">Manage User</a>
    </div>
    <p>Home</p>
    <p>Name : <?php echo $_SESSION['name'] ?></p>
</body>
</html>