<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Details</title>
</head>
<body>
    <h1>Product Details</h1>
    <?php
    include 'products.php';

    if (isset($_GET['id'])) {
        $productId = $_GET['id'];
        $product = getProductById($productId);

        if ($product !== null) {
            echo '<h2>' . $product['name'] . '</h2>';
            echo '<p><strong>Description:</strong> ' . $product['description'] . '</p>';
            echo '<p><strong>Features:</strong> ' . $product['features'] . '</p>';
        } else {
            echo '<p>Product not found</p>';
        }
    } else {
        echo '<p>Product not found</p>';
    }
    ?>
    <p><a href="index.php">Back to List</a></p>
</body>
</html>
