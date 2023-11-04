<?php
require_once 'team.php';

// Handle file upload
function handleFileUpload($fileInputName) {
    if (isset($_FILES[$fileInputName]) && $_FILES[$fileInputName]['error'] === UPLOAD_ERR_OK) {
        // Get the file details
        $fileTmpPath = $_FILES[$fileInputName]['tmp_name'];
        $fileName = $_FILES[$fileInputName]['name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // Sanitize file name
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

        // Specify the directory where the file is going to be placed
        $uploadFileDir = './uploaded_files/';
        if (!is_dir($uploadFileDir)) {
            mkdir($uploadFileDir, 0755, true);
        }
        $dest_path = $uploadFileDir . $newFileName;

        // Move the file to the directory
        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            return $dest_path;
        }
    }
    return null; // Return null if no file was uploaded
}

// Handle POST request for Create and Update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['create'])) {
        // Create a new member
        $newMember = [
            'name' => $_POST['name'],
            'role' => $_POST['role'],
            'background' => $_POST['background'],
            'image' => handleFileUpload('image') // Handle file upload
        ];
        TeamUtil::createMember($newMember);
    } elseif (isset($_POST['update'])) {
        // Update an existing member
        $updatedMember = [
            'name' => $_POST['name'],
            'role' => $_POST['role'],
            'background' => $_POST['background'],
            'image' => handleFileUpload('image') // Handle file upload
        ];
        TeamUtil::updateMember($_POST['index'], $updatedMember);
    }
}

// Handle GET request for Delete
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'delete') {
    TeamUtil::deleteMember($_GET['index']);
}

// Read the team
$team = TeamUtil::readTeam();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Team Manager</title>
    <script>
        function confirmDelete(index) {
            const confirmed = confirm('Are you sure you want to delete this member?');
            if (confirmed) {
                window.location.href = '?action=delete&index=' + index;
            }
        }
    </script>
</head>
<body>
    <h1>Team Manager</h1>

    <!-- Display Team Members -->
    <table border="1">
        <tr>
            <th>Index</th>
            <th>Name</th>
            <th>Role</th>
            <th>Background</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($team['team'] as $index => $member): ?>
            <tr>
                <td><?= $index ?></td>
                <td><?= htmlspecialchars($member['name']) ?></td>
                <td><?= htmlspecialchars($member['role']) ?></td>
                <td><?= htmlspecialchars($member['background']) ?></td>
                <td><img src="<?= htmlspecialchars($member['image']) ?>" alt="Image" height="50"></td>
                <td>
                    <button onclick="confirmDelete(<?= $index ?>)">Delete</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <!-- Create Member Form -->
<h2>Add New Member</h2>
<form method="post" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Name" required>
    <input type="text" name="role" placeholder="Role" required>
    <input type="text" name="background" placeholder="Background" required>
    <label for="image">Image Upload:</label>
    <input type="file" name="image" id="image">
    <button type="submit" name="create">Add Member</button>
</form>

<!-- Update Member Form -->
<h2>Update Member</h2>
<form method="post" enctype="multipart/form-data">
    <input type="number" name="index" placeholder="Member Index" required>
    <input type="text" name="name" placeholder="Name" required>
    <input type="text" name="role" placeholder="Role" required>
    <input type="text" name="background" placeholder="Background" required>
    <label for="update_image">Image Upload:</label>
    <input type="file" name="image" id="update_image">
    <button type="submit" name="update">Update Member</button>
</form>
