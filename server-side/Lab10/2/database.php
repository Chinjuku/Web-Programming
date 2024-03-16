<?php
class MyDB extends SQLite3 {
    function __construct() {
       $this->open('questions.db');
    }
 }

$db = new MyDB();
    if(!$db) {
        echo "<script>console.log(' . $db->lastErrorMsg() . ')</script>";
    } else {
        echo "<script>console.log('Opened database successfully')</script>";
    }
?>