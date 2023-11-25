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
        <style>
        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        </style>
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
            //get movie dictionary
            $movie_dict = array();
            $sql = "SELECT movie_id, title FROM movies";
            $result = $connect->query($sql);
            while ($row = $result->fetch_assoc()) {
                $movie_dict[$row['movie_id']] = $row['title'];
            }
            echo "" . print_r($movie_dict) . "<br>";
            //get ratings dictionary
            $ratings_dict = array();
            $sql = "SELECT user_id, movie_id, ratings FROM ratings";
            $result = $connect->query($sql);
            while ($row = $result->fetch_assoc()) {
                $ratings_dict[$row['user_id']][$row['movie_id']] = $row['ratings'];
            }
            echo "" . print_r($ratings_dict) . "<br>";

            //get users dictionary
            $users_dict = array();
            $sql = "SELECT user_id, user_name FROM users";
            $result = $connect->query($sql);
            while ($row = $result->fetch_assoc()) {
                $users_dict[$row["user_id"]] = $row['user_name'];
            }
            echo "" . print_r($users_dict) . "<br>";

            //chosen user is the session_uid, find chosen user
            foreach ($ratings_dict as $user_id => $movie_ids) {
                if ($user_id == $_SESSION['uid']) {
                    $chosen_user = $movie_ids;
                    $chosen_id = $user_id;
                }
            }
            echo "" . print_r($chosen_user) . "<br>";

            //find averages, omit movies that chosen user hasn't rated
            $average_dict = array();
            foreach ($ratings_dict as $user_id => $movie_ids) {
                $average = 0;
                $total_movies = 0;
                foreach ($movie_ids as $movie_key => $movie_id) {
                    if (array_key_exists($movie_key, $chosen_user)) {
                        $average += $movie_id;
                        $total_movies += 1;
                    }
                }
                $average_dict[$user_id] = $average / $total_movies;
            }
            echo "" . print_r($average_dict) . "<br>";

            //normalize all ratings
            /* $normalized_dict = array();
            foreach ($ratings_dict as $user_id => $movie_ids) {
                $normalized_dict[$user_id] = [];
                foreach ($movie_ids as $movie_key => $movie_id) {
                    if (array_key_exists($movie_key, $chosen_user)) {
                        array_push($normalized_dict[$user_id], $movie_id - $average_dict[$user_id]);
                    }
                }
            } */
            //echo "" . print_r($normalized_dict) . "<br>";

            $numerator_dict = array();
            $denom_dict = array();
            $cossim_dict = array();
            foreach ($ratings_dict as $user_id => $movie_ids) {
                $numerator_dict[$user_id] = [];
                $denom_dict[$user_id] = [];
                $cossim_dict[$user_id] = [];
                $numerator = 0;
                $absolute = 0;
                $chosen_absolute = 0;
                foreach ($movie_ids as $movie_key => $movie_id) {
                    if (array_key_exists($movie_key, $chosen_user)) {
                        //echo "" . ($chosen_user[$movie_key] - $average_dict[$chosen_id]) . " * " . ($movie_id - $average_dict[$user_id]);
                        $numerator += ($chosen_user[$movie_key] - $average_dict[$chosen_id]) * ($movie_id - $average_dict[$user_id]);
                        $absolute += ($movie_id - $average_dict[$user_id]) ** 2;
                        $chosen_absolute += ($chosen_user[$movie_key] - $average_dict[$chosen_id]) ** 2;
                        //echo "<br>";
                    }
                }
                echo "<br>";
                array_push($numerator_dict[$user_id], $numerator);
                array_push($denom_dict[$user_id], $absolute * $chosen_absolute);
                array_push($cossim_dict[$user_id], $numerator / sqrt($absolute * $chosen_absolute));
            } 
            echo "" . print_r($numerator_dict) . "<br>";
            echo "" . print_r($denom_dict) . "<br>";
            echo "" . print_r($cossim_dict) . "<br>";

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