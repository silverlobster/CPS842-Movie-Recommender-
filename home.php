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
                    <input type="radio" name="rating" value="1">2
                    <input type="radio" name="rating" value="2">1
                    <input type="radio" name="rating" value="3">3
                    <input type="radio" name="rating" value="4">4
                    <input type="radio" name="rating" value="5">5
                </div>
                <button type="submit">Submit!</button>
            </form>
        </div>
        <p>
            <a href="logout.php">Log Out!</a>
        </p>
    </body>
</html>