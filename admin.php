1


<?php

$db = new PDO("mysql:host=localhost;dbname=rye1", 'root', '');

$query = $db->prepare("SELECT * FROM products");
$query->execute();

$result = $query->fetchAll(PDO::FETCH_ASSOC);

//session_start(); // Start the session to access user data
//// Access user information from the session
//$user = isset($_SESSION['role']) ? (object)[
//    'role' => $_SESSION['role'],
//    'firstName' => $_SESSION['firstName'],
//] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP variables</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/fixedFooter.css">
</head>
<body>
<nav class="navbar navbar-expand-lg  bg-dark text-light" >
    <div class="container-fluid">
        <a class="navbar-brand text-light" href="#">info</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-ico-light"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav text-light">
                <li class="nav-item text-light">
                    <a class="nav-link active text-light" aria-current="page" href="index_html.php">Home</a>
                </li>
                <li class="nav-item text-light">
                    <a class="nav-link text-light" href="master.php?vendors_id=1">laptops</a>
                </li>
                <li class="nav-item text-light">
                    <a class="nav-link text-light" href="master.php?vendors_id=2">movies</a>
                </li>
                <li class="nav-item text-light">
                    <a class="nav-link text-light" href="contact.php">Contacts</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-11">
            <table class="table table-hover border m-5 ">
                <tr>
                    <th>Product</th>
                    <th>Details</th>
                    <th>Wijzigen</th>
                    <th>Delete</th>
                </tr>
                <?php  foreach ($result as $data):?>
                    <tr>
                        <td><?=$data['name'] ?></td>

                        <td><a href="readpage.php?id=<?php echo $data['id']; ?>" class="btn btn-primary" style="height: 35px">details</a></td>
                        <td><a href="updatepage.php?id=<?php echo $data['id']; ?>" class="btn btn-primary"style="height: 35px">wijzig</a>
                        <td><a href="deletepage.php?id=<?php echo $data['id']; ?>" class="btn btn-primary"style="height: 35px">verwijder</a>

                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</div>
<div class="container d-flex justify-content-center">
    <a class="btn btn-outline-primary " href="insert.php" role="button">Voeg een nieuw product toe.</a>
</div>

</body>
</html>
