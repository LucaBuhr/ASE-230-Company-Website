<?php
include 'awards.php';

$awards = getAllAwards();
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
        </tr>
        <?php
		if ($awards) {
			foreach ($awards as $award) {
			echo "<tr>";
			echo "<td>$award</td>";
			echo "<td><a href='detail.php?award=" . urlencode($award) . "'>View</a></td>"; // Include the entire award as a parameter
			echo "</tr>";
		}
	}
?>

    </table>
    <a href="create.php">Create New Award</a>
</body>
</html>
