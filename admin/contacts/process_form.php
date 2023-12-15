<!DOCTYPE html>
<html>
<head>
    <title>Create New Contact Request</title>
</head>
<body>
    <h1>Create New Contact Request</h1>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $phone = $_POST['phone']; 

        include 'contacts.php';

        if (createContact($name, $email, $subject, $phone)) {
            echo '<p>Contact request created successfully.</p>';
        } else {
            echo '<p>Failed to create contact request.</p>';
        }
    }
    ?>
    <form method="post">
        <label for="name">Name:</label>
        <input name="name" id="name" type="text" required><br>
        <label for="email">Email:</label>
        <input name="email" id="email" type="email" required><br>
        <label for="subject">Subject:</label>
        <input name="subject" id="subject" type="text" required><br>
        <label for="phone">Phone:</label> <!-- Added phone input -->
        <input name="phone" id="phone" type="text" required><br>
        <input type="submit" value="Create">
    </form>
    <a href="index.php">Back to List</a>
</body>
</html>
