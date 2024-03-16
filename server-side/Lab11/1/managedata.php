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
        header('Location:./index.php');
    }
    elseif ($_POST['action'] == 'load') {
        $sql = 'SELECT * FROM customers ORDER BY CustomerId DESC LIMIT 1';
        $ret = $db->query($sql);
        $row = $ret->fetchArray(SQLITE3_ASSOC);
        $c_id = $row['CustomerId'];
        $c_fname = $row['FirstName'];
        $c_lname = $row['LastName'];
        $c_address = $row['Address'];
        $c_email = $row['Email'];
        $c_phone = $row['Phone'];
        session_start();

        $_SESSION['CustomerId'] = $c_id;
        $_SESSION['FirstName'] = $c_fname;
        $_SESSION['LastName'] = $c_lname;
        $_SESSION['Address'] = $c_address;
        $_SESSION['Email'] = $c_email;
        $_SESSION['Phone'] = $c_phone;

        header('Location:./index.php');
    }
    elseif ($_POST['action'] == 'clear') {
        session_start();
        unset($_SESSION['CustomerId']);
        unset($_SESSION['FirstName'] );
        unset($_SESSION['LastName']);
        unset($_SESSION['Address']);
        unset($_SESSION['Email']);
        unset($_SESSION['Phone']);
        session_destroy();

        header('Location:./index.php');
    }

?>