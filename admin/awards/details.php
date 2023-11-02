<?php
include 'awards.php';

if (isset($_GET['year'])) {
    $year = $_GET['year'];
    $award = getAwardById($year);
}

if (isset($_POST['delete'])) {
    deleteAward($year);
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Award Details</title>
</head>
<body>
    <h1>Award Details</h1>
    <?php
    if ($award) {
        echo "<p>Year: $year</p>";
        echo "<p>Description: $award</p>";
        echo "<form method='post'>";
        echo "<input type='submit' name='delete' value='Delete'>";
        echo "</form>";
        echo "<a href='edit.php?year=$year'>Edit</a>";
    } else {
        echo "<p>Item not found</p>";
    }
    ?>
    <a href="index.php">Back to List</a>
</body>
</html>
