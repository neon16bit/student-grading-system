<?php
session_start();

function authenticate($username, $password)
{
    $config = include 'config.php';

    if ($username === $config['username'] && password_verify($password, $config['password'])) {
        $_SESSION['loggedin'] = true;
        return true;
    }

    return false;
}

function is_logged_in()
{
    return isset($_SESSION['loggedin']) && $_SESSION['loggedin'];
}

function logout()
{
    session_destroy();
}
