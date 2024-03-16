<?php 
    class MyDB extends SQLite3 {
        function __construct() {
           $this->open('users.db');
        }
     }
  
     // 2. Open Database 
     $db = new MyDB();
     if(!$db) {
        echo $db->lastErrorMsg();
     } 
?>