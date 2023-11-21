<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        require "db_connect.php";
        $name=$_POST['username'];
        $user_password=$_POST['password'];

        //Ensure unique username
        $sql = "SELECT * FROM users WHERE user_name = '$name'";
        if ($connect->query($sql) === TRUE) {
            echo "Username was already taken"
            exit();
        }

        //Insert the user into db
        $sql = "INSERT into users (user_name, user_password) Values ('$name','$user_password')";
        if ($connect->query($sql) === TRUE) {
            header("location: login.php");
        } else {
            die(mysqli_error($connect));
        }
        $connect->close();
    }
?>