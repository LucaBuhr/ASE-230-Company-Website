<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Team Member</title>
</head>
<body>
    <h1>Edit Team Member</h1>
    <?php
    if (isset($_GET['key'])) {
        $key = $_GET['key'];

        $jsonData = file_get_contents('/Applications/XAMPP/xamppfiles/htdocs/ase230/templates/team.json');
        $teamData = json_decode($jsonData, true);

        if ($teamData !== null && array_key_exists($key, $teamData['team'])) {
            $member = $teamData['team'][$key];
            ?>
            <form method="post" action="edit.php?key=<?php echo $key; ?>">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo $member['name']; ?>" required><br>
                
                <label for="role">Role:</label>
                <input type="text" id="role" name="role" value="<?php echo $member['role']; ?>" required><br>
                
                <label for="background">Background:</label><br>
                <textarea id="background" name="background" required><?php echo $member['background']; ?></textarea><br>
                
                <input type="submit" value="Save Changes">
            </form>
            
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $teamData['team'][$key]['name'] = $_POST['name'];
                $teamData['team'][$key]['role'] = $_POST['role'];
                $teamData['team'][$key]['background'] = $_POST['background'];

                $encodedData = json_encode($teamData, JSON_PRETTY_PRINT);
                file_put_contents('/Applications/XAMPP/xamppfiles/htdocs/ase230/templates/team.json', $encodedData);

                ?>
                <p><a href="detail.php?key=<?php echo $key; ?>">Back to Team Member Details</a></p>
                <?php
            }
        } else {
            echo "Team member not found";
            ?>
            <p><a href="index.php">Back to List</a></p>
            <?php
        }
    }
    ?>

</body>
</html>
