<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
    <div class="form-group justify-content-center mx-5">
        <div class="container">
            <h1>Sign Up</h1>
            <form action="signup.php" method="post">
                <div>
                    <label>Username: </label>
                    <input type="text" class="form-control my-3" name="username" placeholder="Enter your username">
                </div>
                <div>
                    <label>Password: </label>
                    <input type="password" class="form-control my-3" name="password" placeholder="Enter your password">
                </div>
                <button type="submit" name="submit" class="btn btn-primary mb-3">Sign Up!</button>
                <?php
                    if (isset($_POST["submit"])) {
                        require "db_connect.php";
                        $name=$_POST['username'];
                        $user_password=$_POST['password'];

                        //Ensure unique username
                        $sql = "SELECT * FROM users WHERE user_name = '$name'";
                        $result = mysqli_query($connect, $sql);

                        if (mysqli_num_rows($result) >= TRUE) {
                            echo "<br> Username is already taken";
                        }
                        else {
                            $sql = "INSERT into users (user_name, user_password) Values ('$name','$user_password')";
                            $connect->query($sql);
                        }

                        $connect->close();
                    }
                ?>
            </form>
        </div>
    </div>
</body>
</html>