<?php

include 'login.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Teacher Login</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css?<?php echo time(); ?>">
</head>

<body>
    <h2>Teacher Login</h2>
    <?php if (isset($_SESSION['loginError'])) : ?>
        <p style="color: red;"><?php echo $_SESSION['loginError']; ?></p>
    <?php
        unset($_SESSION['loginError']);
    endif; ?>
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