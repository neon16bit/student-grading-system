<?php
function connect_db()
{
    $config = include 'config.php';
    $db = new mysqli($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    return $db;
}
