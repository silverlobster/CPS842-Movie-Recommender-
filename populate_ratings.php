<?php
    require 'db_connect.php';

    $connect->query("INSERT INTO `ratings` (`rating_id`, `user_id`, `movie_id`, `ratings`) VALUES
    (1, 6, 1, 3),
    (2, 6, 2, 2),
    (3, 6, 3, 5),
    (4, 6, 4, 4),
    (5, 6, 5, 4),
    (6, 7, 1, 4),
    (7, 7, 2, 5),
    (8, 7, 3, 2),
    (9, 7, 5, 1),
    (10, 8, 2, 3),
    (11, 8, 3, 4),
    (12, 8, 4, 4),
    (13, 8, 5, 5),
    (14, 9, 1, 4),
    (15, 9, 2, 5),
    (16, 9, 3, 3),
    (17, 9, 4, 5),
    (18, 9, 5, 4),
    (19, 10, 1, 5),
    (20, 10, 2, 5),
    (21, 10, 3, 3),
    (22, 10, 4, 3)");

    $movie_dict = array();
    $sql = "SELECT movie_id, title FROM movies";
    $result = $connect->query($sql);
    while ($row = $result->fetch_assoc()) {
        if ($row['movie_id'] < 6 && $row['movie_id'] > 0) {
            continue;
        }
        $movie_dict[$row['movie_id']] = $row['title'];
    }
    print_r($movie_dict);

    $users_result = $connect->query("SELECT * FROM users WHERE user_id = 3 OR user_id = 4 OR user_id = 5 OR user_id = 11");

    while ($row = $users_result->fetch_assoc()) {
        print_r($row);
        foreach ($movie_dict as $key => $value) {
            $user_id = $row['user_id'];
            $rand_num = rand(0,10);
            $rand_skip = rand(0,10);
            print($rand_skip);
            if ($rand_skip == 10) {
                continue;
            }
            else {
                $connect->query("INSERT INTO `ratings` (`user_id`, `movie_id`, `ratings`) VALUES ($user_id, $key, $rand_num)");
            }
        }
    }
?>