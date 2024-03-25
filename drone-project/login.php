<?php
    include './database.php';
    error_reporting(E_ERROR | E_PARSE); 
    session_start();
    $loginError = "";
    if ($_POST['login'] == 'login') {
        $length1 = intval(mb_strlen($_POST['username'], 'UTF-8'));
        $length3 = intval(mb_strlen($_POST['password'], 'UTF-8'));
        $length1 < 3 ? $usernameError = "Please Enter At Least 3 Characters" : $usernameError = "";
        $length3 < 8 ? $passwordError = "Please Enter At Least 8 Characters" : $passwordError = "";
    
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
        color: orange;
    }
    body {
      background-image: url("./public/pics/dronebg.png");
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
    }
  </style>
  </head>
<body class="h-screen flex items-center justify-center bg-blue-200">
  <form method="post" action="" class="flex flex-col px-[60px] backdrop-blur py-[45px] border border-white rounded-3xl">
    <p class="text-4xl font-bold text-center mb-7 text-white">Login</p>
    <div class="flex items-center gap-5">
        <svg viewBox="0 0 24 24" width="35" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M5 21C5 17.134 8.13401 14 12 14C15.866 14 19 17.134 19 21M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
        <input type="text" name="username" placeholder="USERNAME" class="py-3 rounded-3xl text-white mb-2 w-[360px] border-white border-2 bg-transparent outline-none px-5" value="<?php echo $_SESSION['username'] ?>">    
    </div>
    <span><?php echo $_SESSION['usernameError'];?></span>
    <br>
    <div class="flex items-center gap-5">
        <svg viewBox="0 0 24 24" width="35" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 14.5V16.5M7 10.0288C7.47142 10 8.05259 10 8.8 10H15.2C15.9474 10 16.5286 10 17 10.0288M7 10.0288C6.41168 10.0647 5.99429 10.1455 5.63803 10.327C5.07354 10.6146 4.6146 11.0735 4.32698 11.638C4 12.2798 4 13.1198 4 14.8V16.2C4 17.8802 4 18.7202 4.32698 19.362C4.6146 19.9265 5.07354 20.3854 5.63803 20.673C6.27976 21 7.11984 21 8.8 21H15.2C16.8802 21 17.7202 21 18.362 20.673C18.9265 20.3854 19.3854 19.9265 19.673 19.362C20 18.7202 20 17.8802 20 16.2V14.8C20 13.1198 20 12.2798 19.673 11.638C19.3854 11.0735 18.9265 10.6146 18.362 10.327C18.0057 10.1455 17.5883 10.0647 17 10.0288M7 10.0288V8C7 5.23858 9.23858 3 12 3C14.7614 3 17 5.23858 17 8V10.0288" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
        <input type="password" name="password" placeholder="PASSWORD" class="py-3 rounded-3xl text-white mb-2 w-[360px] border-white border-2 bg-transparent outline-none px-5" value="<?php echo $_SESSION['password'] ?>">
    </div>
    <span><?php echo $_SESSION['passwordError']; ?></span>
    <br>
    <span><?php echo $loginError ?></span>
    <button type="submit" name="login" class="py-3 rounded-3xl font-bold mb-4 hover:bg-[#305d7c] hover:text-white hover:border-none transition-all w-full border-white border-2 bg-white outline-none px-5" value="login">Login</button> 
    <a href="./register.php" class="text-white text-center">If you no have account? Register!</a>
   </form>
</body>
</html>
