<?php
    include './database.php';
    error_reporting(E_ERROR | E_PARSE);
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $length1 = strlen($_POST['username']);
        $length2 = strlen($_POST['fullname']);
        $length3 = strlen($_POST['password']);
        $length4 = strlen($_POST['confirmpassword']);

        if ($length1 < 3){
            $usernameerror = "ควรกรอกข้อมูลอย่างน้อย 3 ตัวอักษร";
            echo '<script>alert("ควรกรอกข้อมูลอย่างน้อย 3 ตัวอักษร")</script>';
        } else {
            $usernameerror = "";
        }
        if ($length2 < 8){
            $nameerror = "ควรกรอกข้อมูลอย่างน้อย 8 ตัวอักษร";
            echo '<script>alert("ควรกรอกข้อมูลอย่างน้อย 8 ตัวอักษร")</script>';
        } else {
            $nameerror = "";
        }
        if ($length3 < 8){
            $passworderror = "ควรกรอกข้อมูลอย่างน้อย 8 ตัวอักษร";
            echo '<script>alert("ควรกรอกข้อมูลอย่างน้อย 8 ตัวอักษร")</script>';
        } else {
            $passworderror = "";
        }
        if ($length4 < 8){
            $confirmerror = "ควรกรอกข้อมูลอย่างน้อย 8 ตัวอักษร";
            echo '<script>alert("ควรกรอกข้อมูลอย่างน้อย 8 ตัวอักษร")</script>';   
        } else {
            $confirmerror = "";
        }
        if ($usernameerror || $nameerror || $passworderror || $confirmerror) {
            session_start();
            $_SESSION['usernameError'] = $usernameerror;
            $_SESSION['nameError'] = $nameerror;
            $_SESSION['passwordError'] = $passworderror;
            $_SESSION['confirmError'] = $confirmerror;
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['name'] = $_POST['fullname'];
        }
        else {
            // unset($_SESSION['usernameError'], $_SESSION['nameError'], $_SESSION['passwordError'], $_SESSION['confirmError']);
            session_destroy();
            if(strcmp($_POST['password'],$_POST['confirmpassword']) != 0) {
                $errorPasswordCheck = "รหัสไม่ตรงกัน";
            }
            else {
                $sql =<<<EOF
                    INSERT INTO users (username, user_fullname, user_password)
                    VALUES ("{$_POST['username']}", "{$_POST['fullname']}", "{$_POST['password']}");
                EOF;
                // $sql = <<<EOF
                //     CREATE TABLE users (
                //     user_id INTEGER PRIMARY KEY AUTOINCREMENT,
                //     username VARCHAR(50) NOT NULL,
                //     user_fullname VARCHAR(50) NOT NULL,
                //     user_password VARCHAR(50) NOT NULL
                //     );
                // EOF;
                $ret = $db->exec($sql);
                if(!$ret){
                    echo $db->lastErrorMsg();
                }
                $db->close();
                header("Location: login.php");
                // echo '<script>location.href = "./login.php"</script>';
                
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
    <h1>Register Form</h1>
    <form action="" method="post">
        <span><?php echo $errorPasswordCheck ?></span>
        <p>Username : <input type="text" name="username" value="<?php echo $_SESSION['username']; ?>" /></p>
        <span><?php echo $_SESSION['usernameError']  ?></span>
        <p>FullName : <input type="text" name="fullname" value="<?php echo $_SESSION['name']; ?>" /></p>
        <span><?php echo $_SESSION['nameError']  ?></span>
        <p>Password : <input type="password" name="password" /></p>
        <span><?php echo $_SESSION['passwordError']  ?></span>
        <p>Confirm password : <input type="password" name="confirmpassword" /></p>
        <span><?php echo $_SESSION['confirmError']  ?></span>
        <br>
        <br>
        <button type="submit">Register</button>
    </form>
</body>
</html>

