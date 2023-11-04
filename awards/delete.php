<?php
include 'awards.php';

$awardsManager = new AwardsManager(); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $yearToDelete = $_POST['year']; 
    $awardsManager->deleteAward($yearToDelete);

    header("Location: index.php");
    exit(); 
}

if (isset($_GET['award'])) {
    $yearToDelete = $_GET['award'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Award</title>
</head>
<body>
    <h1>Delete Award</h1>
    <p>Are you sure you want to delete this award?</p>
    <form method="post">
        <input type="hidden" name="year" value="<?php echo $yearToDelete; ?>">
        <input type="submit" value="Delete">
    </form>
    <a href="index.php">Cancel</a>
</body>
</html>
