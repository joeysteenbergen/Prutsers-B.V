<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'webshop';
    $link = mysqli_connect($host, $user, $pass, $db) or die(mysqli_error($link));
?>