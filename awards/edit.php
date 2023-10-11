<?php
include 'awards.php';

if (isset($_GET['award'])) {
    $award = urldecode($_GET['award']);
}

if (isset($_POST['save'])) {
    $newDescription = $_POST['description'];
    modifyAward($award, $newDescription);
    
    // Update the $award variable with the modified description
    $award = $newDescription;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Award</title>
</head>
<body>
    <h1>Edit Award</h1>
    <?php
    if (isset($award)) {
        echo "<form method='post'>";
        echo "<label for='description'>Description:</label>";
        echo "<textarea name='description' required>$award</textarea><br>";
        echo "<input type='submit' name='save' value='Save Changes'>";
        echo "</form>";
        echo "<a href='detail.php?award=" . urlencode($award) . "'>Back to Details</a>";
    } else {
        echo "<p>Item not found</p>";
    }
    ?>
    <a href="index.php">Back to List</a>
</body>
</html>
