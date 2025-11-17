<?php

// Initialize PDO connection
$db = new PDO("mysql:host=localhost;dbname=rye1", 'root', '');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Get product ID from URL parameter
    $id = $_GET['id'];

    // Prepare SQL statement to delete product
    $query = $db->prepare("DELETE FROM products WHERE id = :id");
    $query->bindParam(':id', $id);
    
    // Execute the query
    if ($query->execute()) {
        // Redirect to product list page after successful deletion
        header("Location: admin.php");
        exit();
    } else {
        echo "Error: Unable to delete product.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Product</title>
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
    <h2>Delete Product</h2>
    <p>Are you sure you want to delete the product with ID <?=$id?>?</p>
    
    <?php if ($id): ?>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?=$id?>">
            <button type="submit" class="btn btn-danger">Delete</button>
            <a href="admin.php" class="btn btn-link">Cancel</a>
        </form>
    <?php endif; ?>
</div>

</body>
</html>
