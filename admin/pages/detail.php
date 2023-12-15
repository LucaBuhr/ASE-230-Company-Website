<!DOCTYPE html>
<html>
<head>
    <title>View Page</title>
</head>
<body>
    <h1>View Page</h1>
    <?php
    include 'pages.php';

    if (isset($_GET['page'])) {
        $pageName = $_GET['page'];
        $pageContent = getPageContent($pageName);

        if ($pageContent !== false) {
            echo "<p><strong>HTML Code:</strong> " . $pageContent . "</p>";
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
