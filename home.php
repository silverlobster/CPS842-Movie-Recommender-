<?php
session_start();
require "db_connect.php";
$genre = "";
$sql = "SELECT title, movie_id FROM movies";
$result = $connect->query($sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <title> Home Page</title>
        <style>
        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand mx-3" href="#">
                <?php 
                if (isset($_SESSION['user'])) {
                    echo "Hello " . $_SESSION["user"];
                }
                else {
                    header("location: login.php");
                }
                ?>
                ! Welcome to Movie Recommender</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="test.php">Recommendations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Log Out</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="form-group justify-content-center mx-5 my-3"></div>
            <div class="container">
                <form class="mb-3" action="home.php" method="post">
                    <div class="form-group">
                        <label>Rate a movie!</label>
                        <select class="form-select mb-3 mt-3" name="movie_title">
                            <?php
                            while ($row = $result->fetch_assoc()) {
                                $title = $row['title'];
                                $id = $row['movie_id'];
                                echo '<option value="'.htmlspecialchars($id).'">'.htmlspecialchars($title).'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="rating" value="0">0
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="rating" value="1">1
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="rating" value="2">2
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="rating" value="3">3
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="rating" value="4">4
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="rating" value="5">5
                        </div>
                    </div>
                    <button class="btn btn-secondary my-3" name="submit" type="submit">Submit!</button>
                </form>
            </div>
        </div>

        <?php
        if (isset($_POST["submit"])) {
            //require "db_connect.php";
            //session_start();
            $movie_id = $_POST['movie_title'];
            $rating = $_POST['rating'];

            //check if the user already made a rating for that movie
            $sql_check = "SELECT * FROM ratings WHERE user_id = " . $_SESSION['uid'] . " AND movie_id = $movie_id";
            $result_check = $connect->query($sql_check);

            if ($result_check->num_rows > 0) {
                $id = $result_check->fetch_assoc();
                $sql = "UPDATE ratings SET ratings = '$rating' WHERE rating_id = " . $id['rating_id'];
            } else {
                $sql = "INSERT into ratings (user_id, movie_id, ratings) Values (".$_SESSION['uid'].", $movie_id, $rating)";
            }

            $result_check = $connect->query($sql);
            //find if username exists

            if ($result_check) {
                echo "Movie rating successfully created";
            }
            else {
                die(mysqli_error($connect));
            }
        }
        ?>

        <div>
            <!-- Convert the sql tables into dictionaries -->
            <?php
            $sql = "SELECT * FROM users WHERE user_id != " . $_SESSION['uid'];
            $result = $connect->query($sql);
            // need to find every user that isnt yourself to compare set of movies watched together
            while ($row = $result->fetch_assoc()) {
                $userAverage = 0;
                $comparedUser = $row['user_id'];
                $comparedUserAverage = 0;
                $sql = "SELECT * FROM ratings WHERE user_id";

            }
            //get movie dictionary
            $movie_dict = array();
            $sql = "SELECT movie_id, title FROM movies";
            $result = $connect->query($sql);
            while ($row = $result->fetch_assoc()) {
                $movie_dict[$row['movie_id']] = $row['title'];
            }
            //echo "" . print_r($movie_dict) . "<br>";
            //get ratings dictionary
            $ratings_dict = array();
            $sql = "SELECT user_id, movie_id, ratings FROM ratings";
            $result = $connect->query($sql);
            while ($row = $result->fetch_assoc()) {
                $ratings_dict[$row['user_id']][$row['movie_id']] = $row['ratings'];
            }
            //echo "" . print_r($ratings_dict) . "<br>";

            //get users dictionary
            $users_dict = array();
            $sql = "SELECT user_id, user_name FROM users";
            $result = $connect->query($sql);
            while ($row = $result->fetch_assoc()) {
                $users_dict[$row["user_id"]] = $row['user_name'];
            }
            //echo "" . print_r($users_dict) . "<br>";
            ?>
        </div>

        <!-- This table is to visualize calculation -->
        <div>
            <?php
            echo "<table>";
            echo "<tr>";
            echo "<th> Users </th>";
            for ( $i = 1; $i <= count($movie_dict); $i++ ) {
                echo "<th>" . $movie_dict[$i] . "</th>";
            }
            echo "</tr>";
            foreach ($ratings_dict as $user => $ratings ) {
                echo "<tr>";
                echo "<td>" . $users_dict[$user] . "</td>";
                for ( $i = 1; $i <= count($movie_dict); $i++ ) {
                    if (array_key_exists($i, $ratings)) {
                        echo "<td>". $ratings[$i] . "</td>";
                    }
                    else {
                        echo "<td>"."</td>";
                    }
                }
                echo "</tr>";
            }
            echo "</table>";
            ?>
        </div>

        <!-- This div is for the returned movies that the user has already rated -->
            <?php
            $sql = "SELECT * FROM ratings WHERE user_id = " . $_SESSION['uid'];
            $result = $connect->query($sql);
            while ($row = $result->fetch_assoc()) {
                $user_id = $row['user_id'];
                $movie_id = $row['movie_id'];
                $rating = $row['ratings'];
                $sql = "SELECT * FROM movies WHERE movie_id = $movie_id";
                $newResult = $connect->query($sql);
                $movieInfo = $newResult->fetch_assoc();
                $title = $movieInfo['title'];
                $summary = $movieInfo['summary'];
                $genre = $movieInfo['genre'];
                $studio = $movieInfo['studio'];
                echo "<div><h1>$title</h1><p>Synopsis: $summary</p><p>Genres: $genre</p><p>".$_SESSION['user'].": $rating</p></div>";
            }
            ?>
    </body>
</html>