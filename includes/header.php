<?php

// include 'functions.php';

function get_logged_in_username()
{
    return $_SESSION['username'];
}

if (isset($_GET['logout'])) {
    logout();
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="css/styles.css?<?php echo time(); ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>

<body>
    <header class="header">
        <?php if (is_logged_in()) : ?>
            <?php
            $username = htmlspecialchars(get_logged_in_username());
            $initial = strtoupper($username[0]);
            ?>
            <div class="avatar">
                <?php echo $initial; ?>
            </div>
            <?php echo $username; ?>
            <?php echo " | "; ?>
            <a href="?logout=true"> <i class="fas fa-sign-out-alt"></i> <span style="font-weight: bolder;">Logout</span></a>
        <?php endif; ?>
    </header>
</body>

</html>