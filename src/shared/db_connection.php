<?php 
    $connect['host'] = 'localhost';
    $connect['dbname'] = 'book_management';
    $connect['username'] = 'root';
    $connect['password'] = '';

    $dbcon = @mysqli_connect($connect['host'], $connect['username'], $connect['password'], $connect['dbname']);
    if (!$dbcon) {
        die('Connection failed: '. mysqli_connect_error());
    }

?>