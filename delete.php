<?php
include 'awards.php';

if (isset($_GET['year'])) {
    $year = $_GET['year'];
}

if (isset($_POST['confirm'])) {
    deleteAward($year);
    header("Location: index.php");
    exit();
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
        <input type="submit" name="confirm" value="Yes">
        <a href="detail.php?year=<?php echo $year; ?>">No, Go Back</a>
    </form>
</body>
</html>
