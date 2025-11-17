<?php // Database connection
$db = new PDO("mysql:host=localhost;dbname=rye1", 'root', '');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form input
    $name = $_POST['name'];
    $details = $_POST['details'];
    $price = $_POST['price'];
    
    // Prepare SQL statement
    $query = $db->prepare("INSERT INTO products (name, details, price) VALUES (:name, :details, :price)");
    $query->bindParam(':name', $name);
    $query->bindParam(':details', $details);
    $query->bindParam(':price', $price);

    // Execute the query
    if ($query->execute()) {
        // Redirect to the product list page (or show a success message)
        header("Location: admin.php"); // Adjust it to your main product page
        exit();
    } else {
        echo "Error: Unable to add product.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
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
                    <a class="nav-link" href="index.php">Home</a>
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
    <h2>Add New Product</h2>
    <form method="post" action="addproduct.php">
        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="details" class="form-label">Details</label>
            <textarea class="form-control" id="details" name="details" required></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
    <div class="mt-3">
        <a href="admin.php" class="btn btn-link">Back to Product List</a>
    </div>
</div>

</body>
</html>