<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products and Services</title>
</head>
<body>
    <h1>Products and Services</h1>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        <?php
        include 'products.php';

        $products = getProducts();

        foreach ($products as $product) {
            echo '<tr>';
            echo '<td>' . $product['name'] . '</td>';
            echo '<td>' . $product['description'] . '</td>';
            echo '<td>';
            echo '<a href="detail.php?id=' . $product['name'] . '">View</a> | ';
            echo '<a href="delete.php?id=' . $product['name'] . '">Delete</a>';
            echo '<a href="edit.php?id=' . $product['name'] . '">Edit</a> | ';
            echo '</td>';
            echo '</tr>';
        }
        ?>
    </table>
    <br>
    <a href="create.php">Create New Product</a>
    
</body>
</html>
