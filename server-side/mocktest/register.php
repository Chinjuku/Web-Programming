<?php
    include './database.php';
    error_reporting(E_ERROR | E_PARSE); 
    session_start();
    if ($_POST['register'] == 'register') {
        $length1 = intval(mb_strlen($_POST['username'], 'UTF-8'));
        $length2 = intval(mb_strlen($_POST['name'], 'UTF-8'));
        $length3 = intval(mb_strlen($_POST['password'], 'UTF-8'));
        $length1 < 3 ? $usernameError = "กรุณากรอกชื่อผู้ใช้อย่างน้อย 3 ตัวอักษร" : $usernameError = "";
        $length2 < 3 ? $nameError = "กรุณากรอกชื่ออย่างน้อย 3 ตัวอักษร" : $nameError = "";
        $length3 < 8 ? $passwordError = "กรุณากรอกรหัสผ่านอย่างน้อย 8 ตัวอักษร" : $passwordError = "";
    
        if ($usernameError || $nameError || $passwordError) {
            session_start();
            $_SESSION['usernameError'] = $usernameError;
            $_SESSION['nameError'] = $nameError;
            $_SESSION['passwordError'] = $passwordError;
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['name'] = $_POST['name'];
            $_SESSION['password'] = $_POST['password'];
        } else {
            session_start();
            session_destroy();
            $sql =<<<EOF
                INSERT INTO users (user_name, name, password)
                VALUES ("{$_POST['username']}","{$_POST['name']}", "{$_POST['password']}");
            EOF;
            // $sql =<<<EOF
            // CREATE TABLE users (
            // user_id INTEGER PRIMARY KEY AUTOINCREMENT,
            // user_name VARCHAR(50) NOT NULL,
            // name VARCHAR(50) NOT NULL,
            // password VARCHAR(50) NOT NULL
            // );
            // EOF;
            $ret = $db->exec($sql);
            $db->close();
            header("Location: ./login.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    span {
        color: red;
    }
  </style>
  </head>
<body>
  <form method="post" action="">
    UserName: <input type="text" name="username" value="<?php echo $_SESSION['username'] ?>">
    <span><?php echo $_SESSION['usernameError'];?></span>    
    <br>
    Name: <input type="text" name="name" value="<?php echo $_SESSION['name'] ?>">
    <span><?php echo $_SESSION['nameError']; ?></span> 
    <br>
    Password: <input type="password" name="password" value="<?php echo $_SESSION['password'] ?>">
    <span><?php echo $_SESSION['passwordError']; ?></span>
    <br>
    <button type="submit" name="register" value="register">สมัครผู้ใช้</button>
    <a href="./login.php">If you have account? Login!</a>
   </form>
</body>
</html>
