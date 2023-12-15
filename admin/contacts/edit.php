<!DOCTYPE html>
<html>
<head>
    <title>Edit Contact Request</title>
</head>
<body>
    <h1>Edit Contact Request</h1>
    <?php
    include 'contacts.php';

    if (isset($_GET['index'])) {
        $index = $_GET['index'];
        $contact = getContactByIndex($index);

        if ($contact !== false) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $updatedContact = [
                    $_POST['name'],
                    $_POST['email'],
                    $_POST['subject'],
                    $_POST['phone']
                ];

                if (updateContact($index, $updatedContact)) {
                    header("Location: index.php");
                    exit();
                } else {
                    echo '<p>Failed to update contact.</p>';
                }
            }
            ?>
            <form method="post">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo $contact[0]; ?>" required><br>
                
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" value="<?php echo $contact[1]; ?>" required><br>
                
                <label for="subject">Subject:</label><br>
                <input type="text" id="subject" name="subject" value="<?php echo $contact[2]; ?>" required><br>
                
                <label for="phone">Phone:</label><br>
                <input type="text" id="phone" name="phone" value="<?php echo $contact[3]; ?>" required><br>

                <input type="submit" value="Save Changes">
            </form>
            <?php
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
