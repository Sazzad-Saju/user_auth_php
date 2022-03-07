<?php
    $host = "localhost";
    $dbname = 'php_auth';
    $user = "root";
    $pass = "";
    if(!$conn = mysqli_connect($host,$user,$pass,$dbname)){
        die("Failed to connect!");
    }
?>