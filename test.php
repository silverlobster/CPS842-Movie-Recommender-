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
                <?php echo "Hello " . $_SESSION["user"]?>! Welcome to Movie Recommender</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="test.php">Recomendations</a>
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
//print_r($movie_dict);

$ratings_dict = array();
$sql = "SELECT user_id, movie_id, ratings FROM ratings";
$result = $connect->query($sql);
while ($row = $result->fetch_assoc()) {
    $ratings_dict[$row['user_id']][$row['movie_id']] = $row['ratings'];
}

$sim_dict = array();
$sql = "SELECT * FROM users WHERE user_id != " . $_SESSION['uid'];
$result = $connect->query($sql);

//print_r($ratings_dict);
//echo "" . "<br>";
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
    //echo "" . "<br>";
    //print($compared_user);/
    //echo "" . "<br>";
    while($common_movies = $newResult->fetch_assoc()) {
        //if there is a common movie in between two users, calculate the values to get user CF
        //print_r($common_movies);
        //echo "" . "<br>";
        //print(isset($ratings_dict[$compared_user][$common_movies['movie_id']]));
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
