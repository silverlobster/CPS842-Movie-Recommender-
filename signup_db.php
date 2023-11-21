<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name=$_POST['username'];
        $password=$_POST['password'];
        require "db_connect.php";

        $sql = "INSERT into users (user_name, user_password) Values ('$name','$password')";
        if ($connect->query($sql) === TRUE) {
            header("location: login.php");
        } else {
            die(mysqli_error($connect));
        }
    }
?>