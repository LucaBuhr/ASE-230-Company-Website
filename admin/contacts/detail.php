<!DOCTYPE html>
<html>
<head>
    <title>Contact Details</title>
</head>
<body>
    <h1>Contact Details</h1>
    <?php
    include 'contacts.php';

    if (isset($_GET['index'])) {
        $index = $_GET['index'];
        $contact = getContactByIndex($index);

        if ($contact !== false) {
            echo "<p><strong>Name:</strong> " . $contact[0] . "</p>";
            echo "<p><strong>Email:</strong> " . $contact[1] . "</p>";
            echo "<p><strong>Subject:</strong> " . $contact[2] . "</p>";
            echo "<p><strong>Phone:</strong> " . $contact[3] . "</p>"; // Display phone number
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
