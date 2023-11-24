<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        require "db_connect.php";
        session_start();
        $movie_title = $_POST['movie_title'];
        $rating = $_POST['rating'];

        //find if username exists
        $sql = "INSERT into ratings (user_id, movie_id, ratings) Values (".$_SESSION['uid'].", $movie_title, $rating)";
        //$sql = "INSERT INTO ratings (user_id, movie_id, ratings) VALUES (?, ?, ?)";
        $result = $connect->query($sql);
        //$stmt = $connect->prepare($sql);

        //$stmt->bind_param("iii", $user_id, $movie_title, $rating);

        //$result = $stmt->execute();

        //if there exists a user then they should connect
        if ($result) {
            echo "Movie rating successfully created";
        }
        else {
            // $connect->query($sql);
            die(mysqli_error($connect));
        }

        $connect->close();

        
    }
?>