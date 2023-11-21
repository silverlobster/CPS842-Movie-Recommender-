<?php
    $servername = "localhost";
    $dbname = "project";

    $username = $_POST['username'];
    $pass = $_POST['password']; //we can hash this to encrypt it so it's not in plain text if you want

    // Create connection
    $conn = new mysqli($servername, "root", "", $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM users WHERE (user_login_id = '". $username . "' && user_password = '" . $pass . "')";
    $result = $conn->query($sql);
    //there should only be one user that matches both username and pass assuming they're unique
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        session_start();
        $_SESSION["user"] = $row["user_name"];
        $_SESSION['uid'] = $row['user_id'];
        $_SESSION['user_bal'] = $row['user_balance'];
        header("location: home.php");
        exit();
    }
    else {
        header("location: sign-in.html");
        exit();
    }

    $conn->close();
?>