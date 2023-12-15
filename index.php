<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Team Members</title>
</head>
<body>
    <h1>Team Members</h1>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
        <?php
        $jsonData = file_get_contents('/Applications/XAMPP/xamppfiles/htdocs/ase230/templates/team.json');
        $teamData = json_decode($jsonData, true);

        if ($teamData !== null) {
            foreach ($teamData['team'] as $key => $member) {
                echo '<tr>';
                echo '<td>' . $member['name'] . '</td>';
                echo '<td>' . $member['role'] . '</td>';
                echo '<td>';
                echo '<a href="detail.php?key=' . $key . '">View</a> | ';
                echo '</td>';
                echo '</tr>';
            }
        }
        ?>
    </table>
    <br>
    <a href="create.php">Create New Team Member</a>
</body>
</html>
