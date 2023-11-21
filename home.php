<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Home Page</title>
    </head>
    <body>
        <?php
        echo "<h1>Hello</h1>" $_SESSION['user']
        ?>
    </body>
</html>