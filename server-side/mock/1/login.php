<?php
    include './database.php';
    error_reporting(E_ERROR | E_PARSE);
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $length1 = strlen($_POST['username']);
        $length3 = strlen($_POST['password']);

        if ($length1 < 3){
            $usernameerror = "ควรกรอกข้อมูลอย่างน้อย 3 ตัวอักษร";
            // echo '<script>alert("ควรกรอกข้อมูลอย่างน้อย 3 ตัวอักษร")</script>';
        } else {
            $usernameerror = "";
        }
        if ($length3 < 8){
            $passworderror = "ควรกรอกข้อมูลอย่างน้อย 8 ตัวอักษร";
            // echo '<script>alert("ควรกรอกข้อมูลอย่างน้อย 8 ตัวอักษร")</script>';
        } else {
            $passworderror = "";
        }
        if ($usernameerror || $passworderror) {
            session_start();
            $_SESSION['usernameError'] = $usernameerror;
            $_SESSION['passwordError'] = $passworderror;
            $_SESSION['username'] = $_POST['username'];
        }
        else {
            // unset($_SESSION['usernameError'], $_SESSION['nameError'], $_SESSION['passwordError'], $_SESSION['confirmError']);
            session_destroy();  
            $sql = "SELECT * FROM users WHERE username = '{$_POST['username']}' AND user_password = '{$_POST['password']}'";
            $ret = $db->query($sql);
            $row = $ret->fetchArray(SQLITE3_ASSOC);
            if($row <= 0){
                $sendError = "ไม่สามารถเข้าสู่ระบบได้ กรุณาลองไม่อีกครั้ง";
            }
            else {
                session_start();
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['user_fullname'] = $row['user_fullname'];
                header("Location: index.php");
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        span {
            color: red;
        }
    </style>
</head>
<body>
    <h1>Login Form</h1>
    <form action="" method="post">
        <span><?php echo $sendError ?></span>
        <p>Username : <input type="text" name="username" value="<?php echo $_SESSION['username']; ?>" /></p>
        <span><?php echo $_SESSION['usernameError']  ?></span>
        <p>Password : <input type="password" name="password" /></p>
        <span><?php echo $_SESSION['passwordError']  ?></span>
        <br>
        <br>
        <button type="submit">Register</button>
    </form>
</body>
</html>