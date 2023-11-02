<?php
include 'awards.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $year = $_POST['year'];
    $description = $_POST['description'];
    
    createAward($year, $description);
    
    header("Location: edit.php?year=$year");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create New Award</title>
</head>
<body>
    <h1>Create New Award</h1>
    <form method="post">
        <label for="year">Year:</label>
        <input type="text" name="year" required><br>
        <label for="description">Description:</label>
        <textarea name="description" required></textarea><br>
        <input type="submit" value="Create">
    </form>
    <a href="index.php">Back to List</a>
</body>
</html>
