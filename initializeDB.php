<?php
    require 'dbconnect.php';

    $connect->query("CREATE TABLE IF NOT EXISTS users (user_id INT(11) AUTO_INCREMENT PRIMARY KEY, user_name VARCHAR(128), user_password VARCHAR(128))");

    $connect->query("CREATE TABLE IF NOT EXISTS movies (movie_id INT(4) AUTO_INCREMENT PRIMARY KEY, title VARCHAR(128), genre VARCHAR(20), user_id INT(4))");

    echo "Tables successfully made" . "<br>";

    $connect->close();
?>

<!-- $connect->query("CREATE TABLE users (user_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
name VARCHAR(50), tel_no INT(50), email VARCHAR(50), address VARCHAR(50), login_id VARCHAR(50), password VARCHAR(50), cc_num VARCHAR(50), salt VARCHAR(50))"); -->