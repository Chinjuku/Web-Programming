<?php
    include './database.php';
    if ($_POST['action'] == 'save') {
        $sql = "INSERT INTO customers (CustomerId, FirstName, LastName, Address, Email, Phone) 
        VALUES (:CustomerId, :FirstName, :LastName, :Address, :Email, :Phone)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':CustomerId', $_POST['CustomerId']);
        $stmt->bindParam(':FirstName', $_POST['FirstName']);
        $stmt->bindParam(':LastName', $_POST['LastName']);
        $stmt->bindParam(':Address', $_POST['Address']);
        $stmt->bindParam(':Email', $_POST['Email']);
        $stmt->bindParam(':Phone', $_POST['Phone']);
        $stmt->execute();
        // echo '<script>window.location.href = "./index.php"';
        header('Location:./index.php');
    }
    elseif ($_POST['action'] == 'load') {
        $sql = 'SELECT * FROM customers ORDER BY CustomerId DESC LIMIT 1';
        // $ret = ;
        $row = $db->query($sql)->fetchArray(SQLITE3_ASSOC);
        $c_id = $row['CustomerId'];
        $c_fname = $row['FirstName'];
        $c_lname = $row['LastName'];
        $c_address = $row['Address'];
        $c_email = $row['Email'];
        $c_phone = $row['Phone'];
        
        setcookie('CustomerId', $c_id, time() + (86400), "/");
        setcookie('FirstName', $c_fname, time() + (86400), "/");
        setcookie('LastName', $c_lname, time() + (86400), "/");
        setcookie('Address', $c_address, time() + (86400), "/");
        setcookie('Email', $c_email, time() + (86400), "/");
        setcookie('Phone', $c_phone, time() + (86400), "/");

        header('Location:./index.php');
    }
    elseif ($_POST['action'] == 'clear') {
        setcookie('CustomerId', "", time() - 86400, "/" );
        setcookie('FirstName', "", time() - 86400, "/" );
        setcookie('LastName', "", time() - 86400, "/" );
        setcookie('Address', "", time() - 86400, "/" );
        setcookie('Email', "", time() - 86400, "/" );
        setcookie('Phone', "", time() - 86400, "/" );

        header('Location:./index.php');
    }

?>