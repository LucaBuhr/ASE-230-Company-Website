<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Team Member</title>
</head>
<body>
    <h1>Delete Team Member</h1>
    <?php
    if (isset($_GET['key'])) {
        $key = $_GET['key'];

        $jsonData = file_get_contents('/Applications/XAMPP/xamppfiles/htdocs/ase230/templates/team.json');
        $teamData = json_decode($jsonData, true);

        if ($teamData !== null && array_key_exists($key, $teamData['team'])) {
            $member = $teamData['team'][$key];
            ?>
            <p>Are you sure you want to delete the team member "<?php echo $member['name']; ?>"?</p>
            <form method="post" action="delete.php?key=<?php echo $key; ?>">
                <input type="submit" name="confirm" value="Yes, Delete">
                <input type="submit" name="cancel" value="Cancel">
            </form>
            
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm'])) {
                unset($teamData['team'][$key]);

                $teamData['team'] = array_values($teamData['team']);

                $encodedData = json_encode($teamData, JSON_PRETTY_PRINT);
                file_put_contents('/Applications/XAMPP/xamppfiles/htdocs/ase230/templates/team.json', $encodedData);

                echo '<p>Team member has been deleted.</p>';
                ?>
                <p><a href="index.php">Back to List</a></p>
                <?php
            } elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cancel'])) {
                header("Location: detail.php?key=$key");
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
