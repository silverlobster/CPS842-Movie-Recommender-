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
        <title> Home Page</title>
    </head>
    <body>
        <?php
        echo "<h1>Hello</h1>" . $_SESSION["user"] . $_SESSION["uid"]
        ?>
        <div>
            <form action="add_rating.php" method="post">
                <label>Rate a movie!</label>
                <select name="movie_title">
                    <?php
                    while ($row = $result->fetch_assoc()) {
                        $title = $row['title'];
                        $id = $row['movie_id'];
                        echo '<option value="'.htmlspecialchars($id).'">'.htmlspecialchars($title).'</option>';
                    }
                    ?>
                </select>
                <div>
                    <input type="radio" name="rating" value="1">1
                    <input type="radio" name="rating" value="2">2
                    <input type="radio" name="rating" value="3">3
                    <input type="radio" name="rating" value="4">4
                    <input type="radio" name="rating" value="5">5
                </div>
                <button type="submit">Submit!</button>
            </form>
        </div>

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
            $movie_dict = array();
            $sql = "SELECT movie_id, title FROM movies";
            $result = $connect->query($sql);
            while ($row = $result->fetch_assoc()) {
                $movie_dict[$row['movie_id']] = $row['title'];
            }
            echo "" . print_r($movie_dict) . "<br>";

            $ratings_dict = array();
            $sql = "SELECT user_id, movie_id, ratings FROM ratings";
            $result = $connect->query($sql);
            while ($row = $result->fetch_assoc()) {
                $ratings_dict[$row['user_id']][$row['movie_id']] = $row['ratings'];
            }
            echo "" . print_r($ratings_dict) . "<br>";

            $users_dict = array();
            $sql = "SELECT user_id, user_name FROM users";
            $result = $connect->query($sql);
            while ($row = $result->fetch_assoc()) {
                $users_dict[$row["user_id"]] = $row['user_name'];
            }
            echo "" . print_r($users_dict);
            ?>
        </div>

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
                echo "<td>" . $users_dict[$user] . "<td>";
                echo "</tr>";
            }
            ?>
        </div>

        <div>
            <?php 
            $sql = "SELECT title, movie_id FROM movies";
            $result = $connect->query($sql);
            echo "<table>";
            echo "<tr>";
            echo "<th> Users </th>";
            $count = 0;
            while ($row = $result->fetch_assoc()) {
                echo "<th>" . $row['title'] .  "</th>";
                $count++;
            }
            echo "</tr>";
            $sql = "SELECT * FROM users";
            $result = $connect->query($sql);

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['user_name'] .  "</td>";
                $sql_rating = "SELECT * FROM ratings WHERE user_id = " .  $row['user_id'];
                $result_rating = $connect->query($sql_rating);
                /* while ($row_rating = $result_rating->fetch_assoc()) {
                    if ($row_rating[''] == $row['user_id']) {
                    //echo "<td> . $row_rating['"
                } */
                echo "</tr>";
            }
            echo "</table>";
            ?>
        </div>

        <!-- This div is for the returned movies that the user has already rated -->
        <div>
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
        </div>
        <p>
            <a href="logout.php">Log Out!</a>
        </p>
    </body>
</html>