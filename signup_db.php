<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        require "db_connect.php";
        $name=$_POST['username'];
        $user_password=$_POST['password'];

        //Ensure unique username
        $sql = "SELECT * FROM users WHERE user_name = '$name'";
        $result = mysqli_query($connect, $sql);

        if (mysqli_num_rows($result) >= TRUE) {
            echo "Username was already taken";
            exit();
        }
        else {
            $sql = "INSERT into users (user_name, user_password) Values ('$name','$user_password')";
            $connect->query($sql);
            header("location: login.html");
            //die(mysqli_error($connect));
        }

        $connect->close();
    }
?>