<?php
include 'includes/functions.php';

// $_SESSION['loginError'] = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (authenticate($username, $password)) {
        header("Location: grading.php");
        exit;
    } else {
        $_SESSION['loginError'] = "Invalid username or password.";
        header("Location: index.php");
    }
}
