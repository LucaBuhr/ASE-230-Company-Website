<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Product</title>
</head>
<body>
    <h1>Create Product</h1>
    <form method="post" action="create.php">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>
        
        <label for="description">Description:</label><br>
        <textarea id="description" name="description" required></textarea><br>
        
        <label for="features">Features:</label><br>
        <textarea id="features" name="features" required></textarea><br>
        
        <input type="submit" value="Create">
    </form>

    <?php
include 'products.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productName = $_POST['name'];
    $productDescription = $_POST['description'];
    $productFeatures = $_POST['features'];

    $productData = [
        'name' => $productName,
        'description' => $productDescription,
        'features' => $productFeatures
    ];

    $result = createProduct($productData);

    if ($result) {
        echo '<p>Product created successfully.</p>';
    } else {
        echo '<p>Failed to create product.</p>';
    }
}
?>


    <p><a href="index.php">Back to List</a></p>
</body>
</html>
