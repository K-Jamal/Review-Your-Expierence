<?php
$db = new PDO("mysql:host=localhost;dbname=rye1", 'root', '');
$id = $_GET['id'];
$query = $db->prepare("SELECT * FROM products WHERE id=" . $id);

$query->execute();


$vendors = $query->fetchAll(PDO::FETCH_ASSOC);

const NAME_REQUIRED = 'name required';
const REVIEW_REQUIRED = 'review required';
const AGREE_REQUIRED = 'accept conditions';

$errors = [];
$inputs = [];

if (isset($_POST['send'])) {


    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $name = trim($name);
    if (empty($name)) {
        $errors['name'] = NAME_REQUIRED;
    } else {
        $inputs['name'] = $name;
    }

    $review = filter_input(INPUT_POST, 'review', FILTER_SANITIZE_SPECIAL_CHARS);
    $review = trim($review);
    if (empty($review)) {
        $errors['review'] = REVIEW_REQUIRED;
    } else {
        $inputs['review'] = $review;
    }

    $agree = filter_input(INPUT_POST, 'agree', FILTER_SANITIZE_SPECIAL_CHARS);
    $agree = trim($agree);
    if (empty($agree)) {
        $errors['agree'] = AGREE_REQUIRED;
    } else {
        $inputs['agree'] = $agree;
    }

    if (count($errors) === 0) {
        global $db;

        $sth = $db->prepare('INSERT INTO reviews (name, content, product_id) VALUES (:name, :review, :product_id)');
        $sth->bindParam(':name', $inputs['name']);
        $sth->bindParam(':review', $inputs['review']);
        $sth->bindParam(':product_id', $id);
        $result = $sth->execute();

        header("location: detail.php?id=$id");
    }
}


?>
<!doctype html>
<html lang="en">
<head>
    <title>Producten Overzicht</title>
    <!-- Required meta tags -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
          crossorigin="anonymous"/>
</head>
<body>

<!---->
<!--<div class="card m-3 border-1 border-primary">-->
<!--    <div class="row g-0">-->
<!--        <div class="col-md-4">-->
<!--            <img-->
<!--                    src="/img/laptop.avif"-->
<!--                    class="img-fluid rounded-start"-->
<!--                    alt="Card title" />-->
<!--        </div>-->
<!---->
<!--        <div class="col-md-8">-->
<!--            <div class="card-body">-->
<!--                <h5 class="card-title">Surface Laptop Go 3</h5>-->
<!--                <h5 class="price">100$</h5>-->
<!--                <p class="card-text">-->
<!--                    Weighing in at just under 1.13 kg and boasting up to 15 hours of battery life,² Surface Laptop Go 3 has an extra-portable design that lets you work and play anywhere. Get it all done with the performance you need, and stand out from the crowd with a compact design and a durable, cool metal finish-->
<!--                </p>-->
<!--                <p class="card-text">-->
<!---->
<!--                </p>-->
<!---->
<!--                <button class="btn btn-primary  00000">buy now</button>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->




<nav class="navbar navbar-expand-lg  bg-dark text-light">
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


<div class="container">
    <h1 class="my-4">Product</h1>
    <div class="row">
        <?php
        // Database connecting
        try {
            $db = new PDO("mysql:host=localhost; dbname=rye1", "root", "");
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Selects product out of db
            $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
            $query = $db->prepare("SELECT * FROM products WHERE id = :id");
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            // Shows product as card
            foreach ($result as $data) {
                echo ' <div class="card m-3 border-1 border-primary">';
                echo ' <div class="row g-0">';
                echo ' <div class="col-md-4">';
                echo ' <img src="' . htmlspecialchars($data['img']). '" class="img-fluid rounded-start" alt="Card img" />'; //db data img
                echo ' </div>';
                echo ' <div class="col-md-8">';
                echo ' <div class="card-body">';
                echo ' <div class="card-body">';
                echo ' <h5 class="card-title">'. htmlspecialchars($data['name']) .' </h5>';// db data name
                echo ' <h5 class="price">$' . htmlspecialchars($data['price']) . '</h5>';// db data price
                echo ' <p class="card-text">' . htmlspecialchars($data['desc']) . '</p>' ; // db data desc
                echo ' <button class="btn btn-primary ">buy now</button>';
                echo ' </div>';
                echo ' </div>';
                echo ' </div>';
                echo ' </div>';
                echo ' </div>';
            }

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>
    </div>
    <a href="master.php?vendors_id=1" class="btn btn-secondary mt-4">back to Master</a>
</div>




<div class="container-fluid ps-5 mt-5  reviewForm bg-dark bg-gradient">
    <div class="row">

        <div class="col-lg-10">
            <form method="post" action="">
                <div class="mb-3">
                    <label for="n" class="form-label fs-3 text-white">Name</label>
                    <input type="text" class="form-control" id="n" name="name"
                           value="<?php echo $inputs['name'] ?? '' ?>">
                    <div class="form-text text-danger">
                        <?= $errors['name'] ?? '' ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="fs-3 text-white" for="b">review</label>
                    <textarea name="review" id="b" class="form-control "><?php echo $inputs['review'] ?? '' ?></textarea>
                    <div class="form-text text-danger"
                    <?= $errors ['review'] ?? '' ?>
                </div>
        </div>

        <div class="mb-3 form-check text-white pt-2">
            <input type="checkbox" class="form-check-input" id="a" name="agree" value="agree"
            <?php echo(isset($inputs['agree']) ? 'checked="checked"' : '') ?>
            <label class="form-check-label" for="a">Accept Conditions</label>
            <div class="form-text text-danger">
                <?= $errors['agree'] ?? '' ?>
            </div>
        </div>

        <input type="submit" class="btn btn-primary" name="send" value="verzenden">
        </form>
    </div>
</div>
</div>
</div>




<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <?php
        $product_id = $_GET['id'];
        $query = $db->prepare("SELECT * FROM reviews WHERE product_id=" . $product_id);
        $query->execute();


        $vendors = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($vendors as &$data) { ?>
            <div class="col-md-8 mb-3 rounded-5 shadow-lg border-grey reviewBorder">
                <div class="comment mt-3 text-justify ps-4">
                    <h4> <?php echo $data["name"]; ?>          <span class="reviewTime"> <?php echo $data["time"]; ?></span></h4>


                    <p> <?php echo $data["content"]; ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>
</html>