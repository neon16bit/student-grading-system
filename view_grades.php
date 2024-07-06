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

<body>
    <h2>Student Grades</h2>
    <table border="1">
        <tr>
            <th>Student ID</th>
            <th>Subject 1 Marks</th>
            <th>Subject 1 Grade</th>
            <th>Subject 1 GPA</th>
            <th>Subject 1 Credits</th>
            <th>Subject 2 Marks</th>
            <th>Subject 2 Grade</th>
            <th>Subject 2 GPA</th>
            <th>Subject 2 Credits</th>
            <th>Subject 3 Marks</th>
            <th>Subject 3 Grade</th>
            <th>Subject 3 GPA</th>
            <th>Subject 3 Credits</th>
            <th>CGPA</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
                <td><?php echo htmlspecialchars($row['student_id']); ?></td>
                <td><?php echo htmlspecialchars($row['subject1_marks']); ?></td>
                <td><?php echo htmlspecialchars($row['subject1_grade']); ?></td>
                <td><?php echo htmlspecialchars(number_format((float)$row['subject1_gpa'], 2, '.', '')); ?></td>
                <td><?php echo htmlspecialchars(number_format((float)$row['subject1_credits'], 2, '.', '')); ?></td>
                <td><?php echo htmlspecialchars($row['subject2_marks']); ?></td>
                <td><?php echo htmlspecialchars($row['subject2_grade']); ?></td>
                <td><?php echo htmlspecialchars(number_format((float)$row['subject2_gpa'], 2, '.', '')); ?></td>
                <td><?php echo htmlspecialchars(number_format((float)$row['subject2_credits'], 2, '.', '')); ?></td>
                <td><?php echo htmlspecialchars($row['subject3_marks']); ?></td>
                <td><?php echo htmlspecialchars($row['subject3_grade']); ?></td>
                <td><?php echo htmlspecialchars(number_format((float)$row['subject3_gpa'], 2, '.', '')); ?></td>
                <td><?php echo htmlspecialchars(number_format((float)$row['subject3_credits'], 2, '.', '')); ?></td>
                <td><?php echo htmlspecialchars(number_format((float)$row['cgpa'], 2, '.', '')); ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
    <br><br>
    <a href="grading.php">Enter Grades</a>
    <?php include 'includes/footer.php'; ?>
</body>

</html>

<?php
$result->free();
$db->close();
?>