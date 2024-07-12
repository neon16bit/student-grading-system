<?php
session_start();

function authenticate($username, $password)
{
    $config = include 'config.php';

    if ($username === $config['username'] && password_verify($password, $config['password'])) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
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
    header("Location: index.php");
}


function calculate_grade_and_gpa($marks)
{
    if ($marks >= 80) {
        return ['grade' => 'A+', 'gpa' => (float)4.00];
    } elseif ($marks >= 75) {
        return ['grade' => 'A', 'gpa' => (float)3.75];
    } elseif ($marks >= 70) {
        return ['grade' => 'A-', 'gpa' => (float)3.50];
    } elseif ($marks >= 65) {
        return ['grade' => 'B+', 'gpa' => (float)3.25];
    } elseif ($marks >= 60) {
        return ['grade' => 'B', 'gpa' => (float)3.00];
    } elseif ($marks >= 55) {
        return ['grade' => 'B-', 'gpa' => (float)2.75];
    } elseif ($marks >= 50) {
        return ['grade' => 'C+', 'gpa' => (float)2.50];
    } elseif ($marks >= 45) {
        return ['grade' => 'C', 'gpa' => (float)2.25];
    } elseif ($marks >= 40) {
        return ['grade' => 'D', 'gpa' => (float)2.00];
    } else {
        return ['grade' => 'F', 'gpa' => (float)0.00];
    }
}

function calculate_cgpa($subject1, $subject1_credits, $subject2, $subject2_credits, $subject3, $subject3_credits)
{
    $total_credits = $subject1_credits + $subject2_credits + $subject3_credits;
    $cgpa = ($subject1['gpa'] * $subject1_credits + $subject2['gpa'] * $subject2_credits + $subject3['gpa'] * $subject3_credits) / $total_credits;
    return $cgpa;
}
