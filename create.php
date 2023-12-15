<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $teamJsonFile = '/Applications/XAMPP/xamppfiles/htdocs/ase230/templates/team.json';
    $teamData = json_decode(file_get_contents($teamJsonFile), true);

    $newTeamMember = array(
        "name" => $_POST["name"],
        "role" => $_POST["role"],
        "background" => $_POST["background"],
        "image" => $_POST["image"]
    );

    $teamData['team'][] = $newTeamMember;
    $updatedTeamData = json_encode($teamData, JSON_PRETTY_PRINT);
    file_put_contents($teamJsonFile, $updatedTeamData);
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <h2>Create New Team Member</h2>
    <form method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="role">Role:</label>
        <input type="text" id="role" name="role" required><br><br>

        <label for="background">Background:</label>
        <input type="text" id="background" name="background" required><br><br>

        <label for="image">Image URL:</label>
        <input type="text" id="image" name="image" required><br><br>

        <input type="submit" value="Create">
    </form>

</body>
</html>
