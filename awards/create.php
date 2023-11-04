<?php
include 'awards.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $year = $_POST['year'];
    $description = $_POST['description'];
    
    $awardsManager = new AwardsManager();
    header("Location: index.php");
    
    $awardsManager->createAward($year, $description);
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
        <input type="text" name="year" id="year" required>
        <br>
        <label for="description">Description:</label>
        <textarea name="description" id="description" required></textarea>
        <br>
        <input type="submit" value="Create">
    </form>
    <a href="index.php">Back to Awards List</a>
</body>
</html>
