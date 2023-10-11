<?php
include 'awards.php';

if (isset($_GET['award'])) {
    $award = urldecode($_GET['award']);
}

if (isset($_POST['delete'])) {
    deleteAward($award);
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
    if (isset($award)) {
        echo "<table border='1'>";
        echo "<tr><th>Description</th></tr>";
        echo "<tr>";
        echo "<td>$award</td>";
        echo "</tr>";
        echo "</table>";
        echo "<form method='post'>";
        echo "<input type='submit' name='delete' value='Delete'>";
        echo "</form>";
        echo "<a href='edit.php?award=" . urlencode($award) . "'>Edit</a>"; // Include the entire award as a parameter
    } else {
        echo "<p>Item not found</p>";
    }
    ?>
    <a href="index.php">Back to List</a>
</body>
</html>
