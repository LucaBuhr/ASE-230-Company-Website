<!DOCTYPE html>
<html>
<head>
    <title>Contact Requests</title>
</head>
<body>
    <h1>Contact Requests</h1>
    <table border='1'>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Phone</th>
            <th>Action</th>
        </tr>
        <?php
        include 'contacts.php';

        $contacts = getAllContacts();

        if ($contacts) {
            foreach ($contacts as $index => $contact) {
                echo "<tr>";
                echo "<td>" . $contact[0] . "</td>";
                echo "<td>" . $contact[1] . "</td>";
                echo "<td>" . $contact[2] . "</td>";
                echo "<td>" . $contact[3] . "</td>"; // Display phone number
                echo "<td>";
                echo "<a href='detail.php?index=" . $index . "'>View</a> ";
                echo "<a href='edit.php?index=" . $index . "'>Edit</a> ";
                echo "<a href='delete.php?index=" . $index . "'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
    <a href="process_form.php">Create New Contact Request</a>
</body>
</html>
