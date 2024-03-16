<?php
    include './database.php';
    if (isset($_POST['del'])){
        $sql = <<<EOF
        DELETE FROM customers WHERE CustomerId = (SELECT MAX(CustomerId) FROM customers);
        EOF;
        $ret = $db->exec($sql);
        echo '<script>window.location.href = "./index.php"</script>';
    }
    
?>