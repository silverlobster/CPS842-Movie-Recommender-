<?php
session_start();
require "db_connect.php";
?>
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
                        <a class="nav-link" href="home.php">Home</a>
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
    </body>
<html>

<?php
$movie_dict = array();
$sql = "SELECT movie_id, title FROM movies";
$result = $connect->query($sql);
 while ($row = $result->fetch_assoc()) {
     $movie_dict[$row['movie_id']] = $row['title'];
}

$ratings_dict = array();
$sql = "SELECT user_id, movie_id, ratings FROM ratings";
$result = $connect->query($sql);
while ($row = $result->fetch_assoc()) {
    $ratings_dict[$row['user_id']][$row['movie_id']] = $row['ratings'];
}

$sim_dict = array();
$sql = "SELECT * FROM users WHERE user_id != " . $_SESSION['uid'];
$result = $connect->query($sql);

while ($row = $result->fetch_assoc()) {
    $compared_user = $row['user_id'];
    $compared_user_average_rating = 0;
    $user_average_rating = 0;
    $num_same_movies = 0;
    $numerator = 0;
    $compared_user_denom = 0;
    $user_denom = 0;
    //get all user movies that theyve rated
    $sql = "SELECT movie_id, ratings FROM ratings WHERE user_id = ". $_SESSION['uid'];  
    $newResult = $connect->query($sql);
    //print_r($newResult);
    while($common_movies = $newResult->fetch_assoc()) {
        //if there is a common movie in between two users, calculate the values to get user CF
        if (isset($ratings_dict[$compared_user][$common_movies['movie_id']])) {
            //print($num_same_movies);   
            $num_same_movies += 1;
            $user_average_rating += $ratings_dict[$_SESSION['uid']][$common_movies['movie_id']];
            $compared_user_average_rating += $ratings_dict[$compared_user][$common_movies['movie_id']];
        }
    }
    if ($num_same_movies != 0) {
        $user_average_rating /= $num_same_movies;
        $compared_user_average_rating /= $num_same_movies;
        $sql = "SELECT movie_id, ratings FROM ratings WHERE user_id = ". $_SESSION['uid'];
        $newResult = $connect->query($sql);
        while($common_movies = $newResult->fetch_assoc()) {
            //if there is a common movie in between two users, calculate the values to get user CF
            if (isset($ratings_dict[$compared_user][$common_movies['movie_id']])) {
                $numerator += ($ratings_dict[$compared_user][$common_movies['movie_id']] - $compared_user_average_rating) * ($ratings_dict[$_SESSION['uid']][$common_movies['movie_id']] - $user_average_rating);
                $compared_user_denom += ($ratings_dict[$compared_user][$common_movies['movie_id']] - $compared_user_average_rating) ** 2;
                $user_denom += ($ratings_dict[$_SESSION['uid']][$common_movies['movie_id']] - $user_average_rating) ** 2;
            }
        }
        if (sqrt($compared_user_denom * $user_denom) != 0) {
            $sim_dict[$compared_user] = $numerator / (sqrt($compared_user_denom * $user_denom));
        } else {
            $sim_dict[$compared_user] = 0;
        }
    } else {
        $sim_dict[$compared_user] = 0;
    }
}
print_r($sim_dict);
echo "Similarity Matrix Returned. </br>";
function positive($var) {
    if ($var > 0) {
        return true;
    }
}
$sim_dict = array_filter($sim_dict, 'positive');
//print_r($sim_dict);
//echo "</br>";
$recommendations = array();
$sql = "SELECT * FROM movies";
$result = $connect->query($sql);
while ($row = $result->fetch_assoc()) {
    $recommendation_score = 0;
    $invert = 0;
    //if the movie doesnt exist in ratings (they haven't created a rating)
    if (!isset($ratings_dict[$_SESSION['uid']][$row['movie_id']])) {
        foreach($sim_dict as $compared_user => $sim_score) {
            // echo $row['title'] . " $compared_user => $sim_score </br>"; 
            if ($sim_score > 0) {
                if (isset($ratings_dict[$compared_user][$row['movie_id']])) {
                    $recommendation_score += $sim_dict[$compared_user] * $ratings_dict[$compared_user][$row['movie_id']];
                    $invert += $sim_dict[$compared_user];
                }
            }
        }
        if ($invert != 0){
            $recommendations[$row['movie_id']] = (1/$invert) * $recommendation_score;
        }
    }
}
// echo "</br> recommendations are: </br>";
// print_r($recommendations);
arsort($recommendations);
print_r(array_slice($recommendations, 0, 10, TRUE));
echo "<br>";
?>

<?php
    echo "Your Movie Recommendations are: <br>";
    foreach (array_slice($recommendations, 0, 10, TRUE) as $movie_key => $sim_value) {
        if ($sim_value > 3) {
            echo $movie_dict[$movie_key] . "<br>";
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
                if (array_key_exists($i, $recommendations) && $user == $_SESSION['uid']) {
                    echo "<td style='color:green'>". $recommendations[$i] . "</td>";
                }
                else {
                    echo "<td></td>";
                }
            }
        }
        echo "</tr>";
    }
    echo "</table>";
    ?>
</div>
