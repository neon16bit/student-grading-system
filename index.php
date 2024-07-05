<?php

include 'login.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Teacher Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles.css?<?php echo time(); ?>">
</head>

<body class="index-page">
    <div class="login">
        <h2>Teacher Login</h2>
        <?php if (isset($_SESSION['loginError'])) : ?>
            <p style="color: orange;"><?php echo $_SESSION['loginError']; ?></p>
        <?php
            unset($_SESSION['loginError']);
        endif; ?>
        <form action="login.php" method="POST">
            <div class="login-inputs">
                <input type="text" id="username" name="username" placeholder="Username" required>
                <br>
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="login-button-container">
                <input type="submit" value="LOGIN">
            </div>
        </form>
    </div>
    <div class="footer">
        <?php include 'includes/footer.php'; ?>
    </div>
</body>

</html>