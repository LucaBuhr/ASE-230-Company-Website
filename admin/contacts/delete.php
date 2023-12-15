<!DOCTYPE html>
<html>
<head>
    <title>Delete Contact Request</title>
</head>
<body>
    <h1>Delete Contact Request</h1>
    <?php
    include 'contacts.php';

    if (isset($_GET['index'])) {
        $index = $_GET['index'];
        $contact = getContactByIndex($index);

        if ($contact !== false) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['confirm_delete']) && $_POST['confirm_delete'] === 'yes') {
                    if (deleteContact($index)) {
                        echo '<p>Contact deleted successfully.</p>';
                    } else {
                        echo '<p>Failed to delete contact.</p>';
                    }
                } else {
                    echo '<h2>Confirm Deletion</h2>';
                    echo '<p>Are you sure you want to delete this contact?</p>';
                    echo '<form method="post">';
                    echo '<input type="hidden" name="confirm_delete" value="yes">';
                    echo '<input type="submit" value="Yes">';
                    echo '</form>';
                }
            } else {
                echo '<h2>Confirm Deletion</h2>';
                echo '<p>Are you sure you want to delete this contact?</p>';
                echo '<form method="post">';
                echo '<input type="hidden" name="confirm_delete" value="yes">';
                echo '<input type="submit" value="Yes">';
                echo '</form>';
            }
        } else {
            echo "<p>Contact not found</p>";
        }
    } else {
        echo "<p>Contact not found</p>";
    }
    ?>
    <a href="index.php">Back to List</a>
</body>
</html>
