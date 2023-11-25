<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        require "db_connect.php";
        session_start();
        $movie_id = $_POST['movie_title'];
        $rating = $_POST['rating'];

        //check if the user already made a rating for that movie
        $sql_check = "SELECT * FROM ratings WHERE user_id = " . $_SESSION['uid'] . " AND movie_id = $movie_id";
        $result = $connect->query($sql_check);
        if ($result) {
            $id = $result->fetch_assoc();
            $sql = "UPDATE ratings SET ratings = $rating WHERE rating_id = " . $id['rating_id'];
        } else {

            $sql = "INSERT into ratings (user_id, movie_id, ratings) Values (".$_SESSION['uid'].", $movie_id, $rating)";
        }
        $result = $connect->query($sql);
        //find if username exists

        if ($result) {
            echo "Movie rating successfully created";
        }
        else {
            die(mysqli_error($connect));
        }

        $connect->close();

        
    }
?>