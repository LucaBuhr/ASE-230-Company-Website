<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Team Member Details</title>
</head>
<body>
    <h1>Team Member Details</h1>
    <?php
    if (isset($_GET['key'])) {
        $key = $_GET['key'];

        $jsonData = file_get_contents('/Applications/XAMPP/xamppfiles/htdocs/ase230/templates/team.json');
        $teamData = json_decode($jsonData, true);

        if ($teamData !== null && array_key_exists($key, $teamData['team'])) {
            $member = $teamData['team'][$key];

            echo '<p>Name: ' . $member['name'] . '</p>';
            echo '<p>Role: ' . $member['role'] . '</p>';
            echo '<p>Background: ' . $member['background'] . '</p>';
            echo '<p><a href="edit.php?key=' . $key . '">Edit</a> | <a href="delete.php?key=' . $key . '">Delete</a></p>';
        } else {
            echo 'Team member not found';
        }
    } else {
        echo 'Team member key not specified';
    }
    ?>
    <p><a href="index.php">Back to List</a></p>
</body>
</html>
