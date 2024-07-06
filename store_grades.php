<?php
include 'includes/functions.php';

if (!is_logged_in()) {
    header("Location: index.php");
    exit;
}

include 'includes/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $subject1_marks = (float)$_POST['subject1'];
    $subject1_credits = (float)$_POST['subject1_credits'];
    $subject2_marks = (float)$_POST['subject2'];
    $subject2_credits = (float)$_POST['subject2_credits'];
    $subject3_marks = (float)$_POST['subject3'];
    $subject3_credits = (float)$_POST['subject3_credits'];
    $cgpa = (float)$_POST['cgpa'];

    $subject1 = calculate_grade_and_gpa($subject1_marks);
    $subject2 = calculate_grade_and_gpa($subject2_marks);
    $subject3 = calculate_grade_and_gpa($subject3_marks);



    $db = connect_db();

    $stmt = $db->prepare("INSERT INTO grades (student_id, subject1_marks, subject1_grade, subject1_gpa, subject1_credits, subject2_marks, subject2_grade, subject2_gpa, subject2_credits, subject3_marks, subject3_grade, subject3_gpa, subject3_credits, cgpa) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sdsdddsdddsddd", $student_id, $subject1_marks, $subject1['grade'], $subject1['gpa'], $subject1_credits, $subject2_marks, $subject2['grade'], $subject2['gpa'], $subject2_credits, $subject3_marks, $subject3['grade'], $subject3['gpa'], $subject3_credits, $cgpa);

    if ($stmt->execute()) {
        header("Location: grading.php?success=true");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $db->close();
}
