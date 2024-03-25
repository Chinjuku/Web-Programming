<?php
    include './database.php';
    error_reporting(E_ERROR | E_PARSE); 
    session_start();
    $loginError = "";
    if ($_POST['login'] == 'login') {
        $length1 = intval(mb_strlen($_POST['username'], 'UTF-8'));
        $length3 = intval(mb_strlen($_POST['password'], 'UTF-8'));
        $length1 < 3 ? $usernameError = "กรุณากรอกชื่อผู้ใช้อย่างน้อย 3 ตัวอักษร" : $usernameError = "";
        $length3 < 8 ? $passwordError = "กรุณากรอกรหัสผ่านอย่างน้อย 8 ตัวอักษร" : $passwordError = "";
    
        if ($usernameError || $passwordError) {
            session_start();
            $_SESSION['usernameError'] = $usernameError;
            $_SESSION['passwordError'] = $passwordError;
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['password'] = $_POST['password'];
        } else {
            unset($_SESSION['password'], $_SESSION['usernameError'], $_SESSION['passwordError']);
            session_destroy();
            $sql ="SELECT * FROM users WHERE user_name = '{$_POST['username']}' and password = '{$_POST['password']}'";
            $ret = $db->query($sql);
            $row = $ret->fetchArray(SQLITE3_ASSOC);
            if ($row == 0) {
                $loginError = "ยืนยันตัวตนไม่ถูกต้อง";
            }
            else {
                session_start();
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['user_name'] = $row['user_name'];
                $_SESSION['name'] = $row['name'];
                header("Location: ./index.php");
            }
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
    Password: <input type="password" name="password" value="<?php echo $_SESSION['password'] ?>">
    <span><?php echo $_SESSION['passwordError']; ?></span>
    <br>
    <span><?php echo $loginError ?></span>
    <br>
    <button type="submit" name="login" value="login">Login</button> 
    <a href="./register.php">If you no have account? Register!</a>
   </form>
</body>
</html>