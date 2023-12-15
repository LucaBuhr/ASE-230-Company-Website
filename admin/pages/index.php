<!DOCTYPE html>
<html>
<head>
    <title>List Pages</title>
</head>
<body>
    <h1>List Pages</h1>
    <table border='1'>
        <tr>
            <th>Name</th>
            <th>Action</th>
        </tr>
        <?php
        include 'pages.php';

        $pages = getCreatedPagesList();

        if ($pages) {
            foreach ($pages as $page) {
                echo "<tr>";
                echo "<td>" . $page . "</td>";
                echo "<td>";
                echo "<a href='detail.php?page=" . $page . "'>View</a> ";
                echo "<a href='edit.php?page=" . $page . "'>Edit</a> ";
                echo "<a href='delete.php?page=" . $page . "'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
    <a href="create.php">Create New Page</a>
</body>
</html>
