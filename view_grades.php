<?php
include 'includes/functions.php';

if (!is_logged_in()) {
    header("Location: index.php");
    exit;
}

include 'includes/db_connect.php';

$db = connect_db();

$query = "SELECT * FROM grades";
$result = $db->query($query);

include 'includes/header.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>View Student Grades</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/styles.css?<?php echo time(); ?>">
</head>

<body class="view-table-page">
    <div class="container">
        <h2>Student Grades</h2>
        <div class="table-responsive">
            <table>
                <tr>
                    <th>Student ID</th>
                    <th>Subject 1</th>
                    <th>Subject 2</th>
                    <th>Subject 3</th>
                    <th>CGPA</th>
                </tr>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['student_id']); ?></td>
                        <td>
                            Marks: <?php echo htmlspecialchars($row['subject1_marks']); ?><br>
                            Grade: <?php echo htmlspecialchars($row['subject1_grade']); ?><br>
                            GPA: <?php echo htmlspecialchars(number_format((float)$row['subject1_gpa'], 2, '.', '')); ?><br>
                            Credits: <?php echo htmlspecialchars(number_format((float)$row['subject1_credits'], 2, '.', '')); ?>
                        </td>
                        <td>
                            Marks: <?php echo htmlspecialchars($row['subject2_marks']); ?><br>
                            Grade: <?php echo htmlspecialchars($row['subject2_grade']); ?><br>
                            GPA: <?php echo htmlspecialchars(number_format((float)$row['subject2_gpa'], 2, '.', '')); ?><br>
                            Credits: <?php echo htmlspecialchars(number_format((float)$row['subject2_credits'], 2, '.', '')); ?>
                        </td>
                        <td>
                            Marks: <?php echo htmlspecialchars($row['subject3_marks']); ?><br>
                            Grade: <?php echo htmlspecialchars($row['subject3_grade']); ?><br>
                            GPA: <?php echo htmlspecialchars(number_format((float)$row['subject3_gpa'], 2, '.', '')); ?><br>
                            Credits: <?php echo htmlspecialchars(number_format((float)$row['subject3_credits'], 2, '.', '')); ?>
                        </td>
                        <td><?php echo htmlspecialchars(number_format((float)$row['cgpa'], 2, '.', '')); ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>
        <div style="text-align: center;">
            <a href="grading.php" class="btn">Enter New Grades</a>
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>

</html>

<?php
$result->free();
$db->close();
?>