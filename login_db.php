<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        require "db_connect.php";
        $name=$_POST['username'];
        $user_password=$_POST['password'];

        //find if username exists
        $sql = "SELECT * FROM users WHERE user_name = '$name' && user_password = '$user_password'";
        $result = $connect->query($sql);

        //if there exists a user then they should connect
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            session_start();
            $_SESSION["user"] = $row["user_name"];
            $_SESSION['uid'] = $row['user_ID'];
            header("location: home.php");
            exit();
        } else {
            echo "User does not exist";
            exit(); 
        }

        /* $connect->close(); */
    }
?>