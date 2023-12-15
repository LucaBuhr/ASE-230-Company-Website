<?php
function getProducts() {
    $csvFile = '/Applications/XAMPP/xamppfiles/htdocs/ase230/templates/productsAndServices.csv';
    $products = [];

    if (($handle = fopen($csvFile, 'r')) !== false) {
        while (($data = fgetcsv($handle, 1000, ',')) !== false) {
            $product = [
                'name' => $data[0],
                'description' => $data[1],
                'features' => $data[2]
            ];
            $products[] = $product;
        }
        fclose($handle);
    }

    return $products;
}

// Function to retrieve a specific product by ID
function getProductById($productId) {
    $products = getProducts();

    foreach ($products as $product) {
        if ($product['name'] == $productId) {
            return $product;
        }
    }

    return null;
}

// Function to delete a product by name
function deleteProduct($productName) {
    $csvFile = '/Applications/XAMPP/xamppfiles/htdocs/ase230/templates/productsAndServices.csv';
    $products = getProducts();

    $filteredProducts = array_filter($products, function ($product) use ($productName) {
        return $product['name'] !== $productName;
    });

    // Write the updated products (with the product removed) back to the CSV file
    if (($handle = fopen($csvFile, 'w')) !== false) {
        foreach ($filteredProducts as $product) {
            fputcsv($handle, [$product['name'], $product['description'], $product['features']]);
        }
        fclose($handle);
        return true;
    } else {
        return false;
    }
}

function createProduct($productData) {
    $csvFile = '/Applications/XAMPP/xamppfiles/htdocs/ase230/templates/productsAndServices.csv'; // Replace with the actual path to your CSV file

    // Prepare the data for the new product
    $newProduct = [
        $productData['name'],
        $productData['description'],
        $productData['features']
    ];

    // Open the CSV file for writing
    $handle = fopen($csvFile, 'a');

    if ($handle !== false) {
        // Write the new product data to the CSV file
        fputcsv($handle, $newProduct);
        fclose($handle);
        return true;
    } else {
        return false;
    }
}

function updateProduct($productId, $productData) {
    $csvFile = '/Applications/XAMPP/xamppfiles/htdocs/ase230/templates/productsAndServices.csv';
    $products = [];
    
    if (($handle = fopen($csvFile, 'r')) !== false) {
        while (($data = fgetcsv($handle, 1000, ',')) !== false) {
            $products[] = $data;
        }
        fclose($handle);
    }


    $updated = false;
    foreach ($products as &$product) {
        if ($product[0] == $productId) {
            $product[1] = $productData['description'];
            $product[2] = $productData['features'];
            $updated = true;
            break;
        }
    }


    if ($updated) {
        if (($handle = fopen($csvFile, 'w')) !== false) {
            foreach ($products as $product) {
                fputcsv($handle, $product);
            }
            fclose($handle);
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}
?>
