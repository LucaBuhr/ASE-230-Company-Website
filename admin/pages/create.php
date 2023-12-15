<!DOCTYPE html>
<html>
<head>
    <title>Create Page</title>
</head>
<body>
    <h1>Create Page</h1>
    <?php
    include 'pages.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $htmlCode = $_POST['html_code'];

        if (createPage($name, $htmlCode)) {
            echo '<p>Page created successfully.</p>';
        } else {
            echo '<p>Failed to create the page.</p>';
        }
    }
    ?>
    <form method="post" action="create.php">
        <label for="name">Name:</label>
        <input name="name" id="name" type="text" required><br>
        <label for="html_code">HTML Code:</label><br>
        <textarea name="html_code" id="html_code" rows="4" required></textarea><br>
        <input type="submit" value="Create Page">
    </form>
    <a href="index.php">Back to List</a>
</body>
</html>
