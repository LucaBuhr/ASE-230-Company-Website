<?php
include 'awards.php';

$awardsManager = new AwardsManager(); 

if (isset($_GET['award'])) {
    $year = $_GET['award'];
    $description = $awardsManager->getAwardById($year);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Award Details</title>
</head>
<body>
    <h1>Award Details</h1>
    <p>Year: <?php echo $year; ?></p>
    <p>Description: <?php echo $description; ?></p>
    <a href="index.php">Back to Awards List</a>
</body>
</html>
