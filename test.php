<?php
session_start();
require "db_connect.php";

// $movie_dict = array();
// $sql = "SELECT movie_id, title FROM movies";
// $result = $connect->query($sql);
// while ($row = $result->fetch_assoc()) {
//     $movie_dict[$row['movie_id']] = $row['title'];
// }

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
    while($common_movies = $newResult->fetch_assoc()) {
        //if there is a common movie in between two users, calculate the values to get user CF
        if (isset($ratings_dict[$compared_user][$common_movies['movie_id']])) {
            $num_same_movies += 1;
            $user_average_rating += $ratings_dict[$_SESSION['uid']][$common_movies['movie_id']];
            $compared_user_average_rating += $ratings_dict[$compared_user][$common_movies['movie_id']];
        }
    }
    $user_average_rating /= $num_same_movies;
    $compared_user_average_rating /= $num_same_movies;
    while($common_movies = $newResult->fetch_assoc()) {
        //if there is a common movie in between two users, calculate the values to get user CF
        if (isset($ratings_dict[$compared_user][$common_movies['movie_id']])) {
            $numerator += ($ratings_dict[$compared_user][$common_movies['movie_id']] - $compared_user_average_rating) * ($ratings_dict[$_SESSION['uid']][$common_movies['movie_id']] - $user_average_rating0);
            $compared_user_denom += ($ratings_dict[$compared_user][$common_movies['movie_id']] - $compared_user_average_rating) ** 2;
            $user_denom += ($ratings_dict[$_SESSION['uid']][$common_movies['movie_id']] - $user_average_rating0) ** 2;
        }
    }
    if (sqrt($compared_user_denom * $user_denom) != 0) {
        $sim_dict[$compared_user] = $numerator / (sqrt($compared_user_denom * $user_denom));
    } else {
        $sim_dict[$compared_user] = 0;
    }
    print_r($sim_dict);
}
echo "done";
?>