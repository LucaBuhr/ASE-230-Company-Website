<?php
include 'awards.php';

$awardsManager = new AwardsManager(); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $year = $_POST['year'];
    $newDescription = $_POST['description'];
    $awardsManager->modifyAward($year, $newDescription);

    header("Location: index.php");
    exit();
}

if (isset($_GET['award'])) {
    $year = $_GET['award'];
    $description = $awardsManager->getAwardById($year);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Award</title>
</head>
<body>
    <h1>Edit Award</h1>
    <form method="post">
        <input type="hidden" name="year" value="<?php echo $year; ?>">
        <label for="description">Description:</label>
        <textarea name="description" id="description" required><?php echo $description; ?></textarea>
        <br>
        <input type="submit" value="Save">
    </form>
    <a href="index.php">Cancel</a>
</body>
</html>
