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
    <link rel="stylesheet" type="text/css" href="css/styles.css?<?php echo time(); ?>">
</head>

<body>
    <h2>Student Grades</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Student ID</th>
            <th>Subject 1 Marks</th>
            <th>Subject 1 Credits</th>
            <th>Subject 2 Marks</th>
            <th>Subject 2 Credits</th>
            <th>Subject 3 Marks</th>
            <th>Subject 3 Credits</th>
            <th>CGPA</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
                <td><?php echo htmlspecialchars($row['id']); ?></td>
                <td><?php echo htmlspecialchars($row['student_id']); ?></td>
                <td><?php echo htmlspecialchars($row['subject1']); ?></td>
                <td><?php echo htmlspecialchars($row['subject1_credits']); ?></td>
                <td><?php echo htmlspecialchars($row['subject2']); ?></td>
                <td><?php echo htmlspecialchars($row['subject2_credits']); ?></td>
                <td><?php echo htmlspecialchars($row['subject3']); ?></td>
                <td><?php echo htmlspecialchars($row['subject3_credits']); ?></td>
                <td><?php echo htmlspecialchars($row['cgpa']); ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
    <br><br>
    <a href="grading.php">Enter Grades</a>
</body>

</html>

<?php
$db->close();
?>