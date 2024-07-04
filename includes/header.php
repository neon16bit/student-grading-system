<?php

// include 'functions.php';

function get_logged_in_username()
{
    return $_SESSION['username'];
}

if (isset($_GET['logout'])) {
    logout();
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Student Grading System</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
    <header>
        <?php if (is_logged_in()) : ?>
            <div>
                <span>Welcome, <?php echo htmlspecialchars(get_logged_in_username()); ?></span>
                <a href="?logout=true">Logout</a>
            </div>
        <?php endif; ?>

        <h1>Student Grading System</h1>
    </header>
</body>

</html>