<!DOCTYPE html>
<html>
<head>
    <title>Edit Page</title>
</head>
<body>
    <h1>Edit Page</h1>
    <?php
    include 'pages.php';

    if (isset($_GET['page'])) {
        $pageName = $_GET['page'];
        $pageContent = getPageContent($pageName);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $updatedHtmlCode = $_POST['html_code'];

            if (updatePageContent($pageName, $updatedHtmlCode)) {
                echo '<p>Page updated successfully.</p>';
            } else {
                echo '<p>Failed to update the page.</p>';
            }
        }
    }

    if ($pageContent !== false) {
        ?>
        <form method="post" action="edit.php?page=<?php echo $pageName; ?>">
            <label for="html_code">HTML Code:</label><br>
            <textarea name="html_code" id="html_code" rows="4" required><?php echo $pageContent; ?></textarea><br>
            <input type="submit" value="Save Changes">
        </form>
        <?php
    } else {
        echo "<p>Page not found</p>";
    }
    ?>
    <a href="index.php">Back to List</a>
</body>
</html>
