<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        require "db_connect.php";
        session_start();
        $movie_title = $_POST['movie_title'];
        $rating = $_POST['rating'];

        //find if username exists
        $sql = "INSERT into ratings (user_id, movie_id, rating) Values (".$_SESSION['uid'].", $movie_title, $rating)";
        // echo $sql;
        $result = $connect->query($sql);

        //if there exists a user then they should connect
        if ($result === TRUE) {
            echo "Movie rating successfully created";
        }
        else {
            // $connect->query($sql);
            die(mysqli_error($connect));
        }

        /* $connect->close(); */
    }
?>