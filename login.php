<?php
include 'includes/functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (authenticate($username, $password)) {
        header("Location: grading.php");
        exit;
    } else {
        echo "Invalid username or password.";
    }
}
