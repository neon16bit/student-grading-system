<!DOCTYPE html>
<html>

<head>
    <title>Teacher Login</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
    <h2>Teacher Login</h2>
    <form action="login.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <input type="submit" value="Login">
    </form>
</body>

</html>