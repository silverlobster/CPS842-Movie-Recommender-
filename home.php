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
        echo "<h1>Hello</h1>" . $_SESSION["user"]
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
        <!-- This div is for the returned movies that the user has already rated -->
        <div>
            <?php
            $sql = "SELECT * FROM ratings WHERE user_id = " . $_SESSION['uid'];
            $result = $connect->query($sql);
            while ($row = $result->fetch_assoc()) {
                $user_id = $row['user_id'];
                $movie_id = $row['movie_id'];
                $rating = $row['rating'];
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