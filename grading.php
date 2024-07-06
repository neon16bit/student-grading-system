<?php
include 'includes/functions.php';

if (!is_logged_in()) {
    header("Location: index.php");
    exit;
}

include 'includes/header.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Enter Grades</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css?<?php echo time(); ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/script.js?<?php echo time(); ?>"></script>
</head>

<body>
    <h2>Enter Student Grades</h2>
    <form id="gradesForm" action="store_grades.php" method="POST">
        <label for="student_id">Student ID:</label>
        <input type="text" id="student_id" name="student_id" required>
        <br>
        <label for="subject1">Subject 1 Marks:</label>
        <input type="number" id="subject1" name="subject1" required>
        <br>
        <label for="subject1_credits">Subject 1 Credits:</label>
        <input type="number" id="subject1_credits" name="subject1_credits" required>
        <br>
        <label for="subject1_grade">Subject 1 Grade:</label>
        <span id="subject1_grade"></span>
        <br>
        <label for="subject1_gpa">Subject 1 GPA:</label>
        <span id="subject1_gpa"></span>
        <br>
        <label for="subject2">Subject 2 Marks:</label>
        <input type="number" id="subject2" name="subject2" required>
        <br>
        <label for="subject2_credits">Subject 2 Credits:</label>
        <input type="number" id="subject2_credits" name="subject2_credits" required>
        <br>
        <label for="subject2_grade">Subject 2 Grade:</label>
        <span id="subject2_grade"></span>
        <br>
        <label for="subject2_gpa">Subject 2 GPA:</label>
        <span id="subject2_gpa"></span>
        <br>
        <label for="subject3">Subject 3 Marks:</label>
        <input type="number" id="subject3" name="subject3" required>
        <br>
        <label for="subject3_credits">Subject 3 Credits:</label>
        <input type="number" id="subject3_credits" name="subject3_credits" required>
        <br>
        <label for="subject3_grade">Subject 3 Grade:</label>
        <span id="subject3_grade"></span>
        <br>
        <label for="subject3_gpa">Subject 3 GPA:</label>
        <span id="subject3_gpa"></span>
        <br>
        <input type="hidden" id="cgpa" name="cgpa">
        <button type="button" onclick="calculateCGPA()">Calculate CGPA</button>
        <button type="submit">Submit</button>
    </form>
    <p id="result"></p>
    <a href="view_grades.php">View All Student Grades</a>

    <?php include 'includes/footer.php'; ?>
</body>

</html>