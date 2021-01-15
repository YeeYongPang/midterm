<?php
    $hn = 'localhost';
    $db = 'midterm';
    $un = 'root';
    $pw = '';

    $conn = new mysqli($hn,$un,$pw,$db);
    if($conn->connect_error){
        die("Fatal Error");
    }
?>