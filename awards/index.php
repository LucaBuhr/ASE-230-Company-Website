<?php
include 'awards.php';

$awardsManager = new AwardsManager();

$awards = $awardsManager->getAllAwards();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Awards List</title>
</head>
<body>
    <h1>Awards List</h1>
    <table border='1'>
        <tr>
            <th>Year</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        <?php
        if ($awards) {
            foreach ($awards as $award) {
                echo "<tr>";
                echo "<td>" . $award['year'] . "</td>";
                echo "<td>" . $award['description'] . "</td>";
                echo "<td>";
                echo "<a href='detail.php?award=" . urlencode($award['year']) . "'>View</a>";
                echo " | <a href='edit.php?award=" . urlencode($award['year']) . "'>Edit</a>";
                echo " | <a href='delete.php?award=" . urlencode($award['year']) . "'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
    <a href="create.php">Create New Award</a>
</body>
</html>
