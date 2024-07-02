<?php
include 'includes/functions.php';

if (!is_logged_in()) {
    header("Location: index.php");
    exit;
}

include 'includes/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $subject1 = $_POST['subject1'];
    $subject1_credits = $_POST['subject1_credits'];
    $subject2 = $_POST['subject2'];
    $subject2_credits = $_POST['subject2_credits'];
    $subject3 = $_POST['subject3'];
    $subject3_credits = $_POST['subject3_credits'];
    $cgpa = $_POST['cgpa'];

    $db = connect_db();

    $stmt = $db->prepare('INSERT INTO grades (student_id, subject1, subject1_credits, subject2, subject2_credits, subject3, subject3_credits, cgpa) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->bind_param('sidididi', $student_id, $subject1, $subject1_credits, $subject2, $subject2_credits, $subject3, $subject3_credits, $cgpa);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $db->close();
}
