<?php
include 'products.php';

if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    if (isset($_POST['confirm_delete']) && $_POST['confirm_delete'] === 'yes') {
        if (deleteProduct($productId)) {
            header("Location: index.php");
            exit();
        } else {
            echo '<p>Failed to delete product.</p>';
        }
    } else {
        echo '<h2>Confirm Deletion</h2>';
        echo '<p>Are you sure you want to delete this product?</p>';
        echo '<form method="post">';
        echo '<input type="hidden" name="confirm_delete" value="yes">';
        echo '<input type="submit" value="Yes">';
        echo '<a href="index.php">No, Go Back</a>';
        echo '</form>';
    }
} else {
    echo '<p>Product not found</p>';
}
?>
