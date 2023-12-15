<!DOCTYPE html>
<html>
<head>
    <title>Delete Page</title>
</head>
<body>
    <h1>Delete Page</h1>
    <?php
    include 'pages.php';

    if (isset($_GET['page'])) {
        $pageName = $_GET['page'];
        $pageContent = getPageContent($pageName);

        if ($pageContent !== false) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['confirm_delete']) && $_POST['confirm_delete'] === 'yes') {
                    if (deletePage($pageName)) {
                        echo '<p>Page deleted successfully.</p>';
                    } else {
                        echo '<p>Failed to delete the page.</p>';
                    }
                }
            } else {
                echo '<h2>Confirm Deletion</h2>';
                echo '<p>Are you sure you want to delete this page?</p>';
                echo '<form method="post" action="delete.php?page=' . $pageName . '">';
                echo '<input type="hidden" name="confirm_delete" value="yes">';
                echo '<input type="submit" value="Yes">';
                echo '<a href="index.php">No, Go Back</a>';
                echo '</form>';
            }
        } else {
            echo "<p>Page not found</p>";
        }
    } else {
        echo "<p>Page not found</p>";
    }
    ?>
    <a href="index.php">Back to List</a>
</body>
</html>
