<?php

// Initialize PDO connection
$db = new PDO("mysql:host=localhost;dbname=rye1", 'root', '');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Get product ID from URL parameter
    $id = $_GET['id'];

    // Prepare SQL statement to select product details
    $query = $db->prepare("SELECT * FROM products WHERE id = :id");
    $query->bindParam(':id', $id);
    
    // Execute the query
    if ($query->execute()) {
        // Fetch the product details from the query result
        $product = $query->fetch(PDO::FETCH_ASSOC);
    } else {
        echo "Error: Unable to retrieve product details.";
    }
}

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get updated product details
    $name = $_POST['name'];
    $details = $_POST['details'];
    $price = $_POST['price'];

    // Prepare SQL statement to update product
    $query = $db->prepare("UPDATE products SET name = :name, details = :details, price = :price WHERE id = :id");
    $query->bindParam(':id', $id);
    $query->bindParam(':name', $name);
    $query->bindParam(':details', $details);
    $query->bindParam(':price', $price);

    // Execute the query
    if ($query->execute()) {
        // Redirect to product list page after successful update
        header("Location: admin.php");
        exit();
    } else {
        echo "Error: Unable to update product.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-dark text-light">
    <div class="container-fluid">
        <a class="navbar-brand text-light" href="#">info</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav text-light">
                <li class="nav-item">
                    <a class="nav-link" href="index_html.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="master.php?vendors_id=1">laptops</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="master.php?vendors_id=2">movies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contacts</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <h2>Update Product</h2>
    <?php 
    if (isset($product['name'])) : ?>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?=$product['id']?>">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?=$product['name']?>" required>
            </div>
            <div class="mb-3">
                <label for="details" class="form-label">Details</label>
                <textarea class="form-control" id="details" name="details" required><?=$product['details']?></textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" value="<?=$product['price']?>" required>
            </div>
            <button type="submit" class="btn btn-success">Update Product</button>
        </form>
    <?php endif; ?>
</div>

</body>
</html>