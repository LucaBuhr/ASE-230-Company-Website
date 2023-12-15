<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <?php
    include 'products.php';

    if (isset($_GET['id'])) {
        $productId = $_GET['id'];
        $product = getProductById($productId); 

        if ($product !== null) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $productData = [
                    'name' => $_POST['name'],
                    'description' => $_POST['description'],
                    'features' => $_POST['features']
                ];

                $result = updateProduct($productId, $productData); 

                if ($result) {
                    echo '<p>Product updated successfully.</p>';
                } else {
                    echo '<p>Failed to update product.</p>';
                }
            }
            ?>
            <form method="post" action="edit.php?id=<?php echo $productId; ?>">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo $product['name']; ?>" required><br>
                
                <label for="description">Description:</label><br>
                <textarea id="description" name="description" required><?php echo $product['description']; ?></textarea><br>
                
                <label for="features">Features:</label><br>
                <textarea id="features" name="features" required><?php echo $product['features']; ?></textarea><br>
                
                <input type="submit" value="Save Changes">
            </form>
            <?php
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
