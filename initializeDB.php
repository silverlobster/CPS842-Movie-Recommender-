<?php
    require 'db_connect.php';

    $connect->query("CREATE TABLE IF NOT EXISTS users (user_id INT(11) AUTO_INCREMENT PRIMARY KEY, user_name VARCHAR(128), user_password VARCHAR(128))");

    $connect->query("CREATE TABLE IF NOT EXISTS movies (movie_id INT(4) AUTO_INCREMENT PRIMARY KEY, title VARCHAR(128), genre VARCHAR(20), user_id INT(4))");

    echo "Tables successfully made" . "<br>";

    $connect->close();
?>
