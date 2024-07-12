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
    <link rel="stylesheet" type="text/css" href="css/styles.css?<?php echo time(); ?>">
</head>

<body class="view-table-page">
    <div class="container">
        <h2>Student Grades</h2>
        <div class="table-responsive">
            <table class="grades-table">
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Computer Networks</th>
                        <th>Internet Programming</th>
                        <th>Database</th>
                        <th>CGPA</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td style="vertical-align: middle; text-align: center; font-weight: Bold"><?php echo htmlspecialchars($row['student_id']); ?></td>
                            <td>
                                <div class="grade-info">
                                    <span class="label">Marks:</span>
                                    <span class="value"><?php echo htmlspecialchars($row['subject1_marks']); ?></span>
                                </div>
                                <div class="grade-info">
                                    <span class="label">Grade:</span>
                                    <span class="value"><?php echo htmlspecialchars($row['subject1_grade']); ?></span>
                                </div>
                                <div class="grade-info">
                                    <span class="label">GPA:</span>
                                    <span class="value"><?php echo htmlspecialchars(number_format((float)$row['subject1_gpa'], 2, '.', '')); ?></span>
                                </div>
                                <div class="grade-info">
                                    <span class="label">Credits:</span>
                                    <span class="value"><?php echo htmlspecialchars(number_format((float)$row['subject1_credits'], 2, '.', '')); ?></span>
                                </div>
                            </td>
                            <td>
                                <div class="grade-info">
                                    <span class="label">Marks:</span>
                                    <span class="value"><?php echo htmlspecialchars($row['subject2_marks']); ?></span>
                                </div>
                                <div class="grade-info">
                                    <span class="label">Grade:</span>
                                    <span class="value"><?php echo htmlspecialchars($row['subject2_grade']); ?></span>
                                </div>
                                <div class="grade-info">
                                    <span class="label">GPA:</span>
                                    <span class="value"><?php echo htmlspecialchars(number_format((float)$row['subject2_gpa'], 2, '.', '')); ?></span>
                                </div>
                                <div class="grade-info">
                                    <span class="label">Credits:</span>
                                    <span class="value"><?php echo htmlspecialchars(number_format((float)$row['subject2_credits'], 2, '.', '')); ?></span>
                                </div>
                            </td>
                            <td>
                                <div class="grade-info">
                                    <span class="label">Marks:</span>
                                    <span class="value"><?php echo htmlspecialchars($row['subject3_marks']); ?></span>
                                </div>
                                <div class="grade-info">
                                    <span class="label">Grade:</span>
                                    <span class="value"><?php echo htmlspecialchars($row['subject3_grade']); ?></span>
                                </div>
                                <div class="grade-info">
                                    <span class="label">GPA:</span>
                                    <span class="value"><?php echo htmlspecialchars(number_format((float)$row['subject3_gpa'], 2, '.', '')); ?></span>
                                </div>
                                <div class="grade-info">
                                    <span class="label">Credits:</span>
                                    <span class="value"><?php echo htmlspecialchars(number_format((float)$row['subject3_credits'], 2, '.', '')); ?></span>
                                </div>
                            </td>
                            <td style="vertical-align: middle; text-align: center;"><?php echo htmlspecialchars(number_format((float)$row['cgpa'], 2, '.', '')); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <div style="text-align: center; margin-top: 20px;">
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