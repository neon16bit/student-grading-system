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

<body style="height: 100vh;">
    <div class="grades-container">
        <h2 class="grades-title">Enter Student Grades</h2>
        <form id="gradesForm" class="grades-form" action="store_grades.php" method="POST">
            <div class="form-group">
                <label for="student_id">Student ID:</label>
                <input type="text" id="student_id" name="student_id" required maxlength="11">
            </div>

            <div class="subject-group">
                <h4 class="subject-title">Computer Networks</h4>
                <div class="form-group">
                    <label for="subject1">Marks:</label>
                    <input type="text" id="subject1" name="subject1" required pattern="^\d*(\.\d+)?$">
                </div>
                <div class="form-group">
                    <label for="subject1_credits">Credits:</label>
                    <input type="text" id="subject1_credits" name="subject1_credits" required pattern="^\d*(\.\d+)?$">
                </div>
                <div class="form-group grade-gpa-group" id="grade-gpa-group-1" style="display: none;">
                    <div>
                        <label>Grade: <span id="subject1_grade"></span></label>
                        <label>GPA: <span id="subject1_gpa"></span></label>
                    </div>
                </div>
            </div>

            <div class="subject-group">
                <h4 class="subject-title">Internet Programming</h4>
                <div class="form-group">
                    <label for="subject2">Marks:</label>
                    <input type="text" id="subject2" name="subject2" required pattern="^\d*(\.\d+)?$">
                </div>
                <div class="form-group">
                    <label for="subject2_credits">Credits:</label>
                    <input type="text" id="subject2_credits" name="subject2_credits" required pattern="^\d*(\.\d+)?$">
                </div>
                <div class="form-group grade-gpa-group" id="grade-gpa-group-2" style="display: none;">
                    <div>
                        <label>Grade: <span id="subject2_grade"></span></label>
                        <label>GPA: <span id="subject2_gpa"></span></label>
                    </div>
                </div>
            </div>

            <div class="subject-group">
                <h4 class="subject-title">Database</h4>
                <div class="form-group">
                    <label for="subject3">Marks:</label>
                    <input type="text" id="subject3" name="subject3" required pattern="^\d*(\.\d+)?$">
                </div>
                <div class="form-group">
                    <label for="subject3_credits">Credits:</label>
                    <input type="text" id="subject3_credits" name="subject3_credits" required pattern="^\d*(\.\d+)?$">
                </div>
                <div class="form-group grade-gpa-group" id="grade-gpa-group-3" style="display: none;">
                    <div>
                        <label for="subject3_grade">Grade: <span id="subject3_grade"></span></label>
                        <label for="subject3_gpa">GPA: <span id="subject3_gpa"></span></label>
                    </div>
                </div>
            </div>

            <input type="hidden" id="cgpa" name="cgpa">
            <label id="result" class="result"></label>

            <div class="button-group">
                <button type="submit" class="submit-btn">Submit</button>
            </div>
        </form>
        <a href="view_grades.php" class="view-link">View All Student Grades</a>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>

</html>