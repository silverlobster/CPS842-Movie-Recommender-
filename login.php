<!DOCTYPE html>
<html>
<head>
    <title>
        Log In
    </title>
</head>
<body>
    <h1>Log In</h1>
    <div class="container">
        <form action="login_db.php" method="post">
            <div>
                <label>Username: </label>
                <input type="text" name="username" placeholder="Enter your username">
            </div>
            <div>
                <label>Password: </label>
                <input type="password" name="password" placeholder="Enter your password">
            </div>
            <button type="submit">Log In!</button>
        </form>
    </div>
</body>
</html>