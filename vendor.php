<?php
//$db = new PDO( "mysql:host=localhost; dbname=rye1",
//    "root" , "" );
//
//$query = $db->prepare("SELECT * FROM products");
//
//$query-> execute();
//$result = $query->fetchAll(PDO::FETCH_ASSOC);
//foreach ($result as $data) {
//    echo "<a href='detail.php?id=". $data['id']."'> ";
//    echo $data['name']. " " . $data['price']. " >>>>>>>>>>>" . $data['id'];
//    echo "</a>";
//    echo" <br>";
//
//}

//
//try {
//    include_once ('vendor.php');
//    $db = new PDO( "mysql:host=localhost; dbname=rye1", "root" , "" );
//}catch ( PDOException $e ) {
//    die('Database server not active');
//}
//
//$query = $db->prepare("SELECT * FROM vendors");
//$query-> execute();
//$vendors=$query->fetchAll(PDO::FETCH_CLASS,  'Vendor');
//
//foreach ($vendors as $vendor) :?>
<!--    --><?php //= $vendor->name?>
<!--    <img src="img/vendors/--><?php //= $vendor->img?><!--" alt="image not visible "/>-->
<!--    <br>-->
<!--    --><?php //endforeach; ?>
<!---->
<!--?>-->

<?php
$db = new PDO("mysql:host=localhost;dbname=rye1", 'root', '');
$query = $db->prepare("SELECT * FROM vendors");
$query->execute();


$vendors = $query->fetchAll(PDO::FETCH_ASSOC); ?>
<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>

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
                    <li class="nav-item text-light">
                        <a class="nav-link text-light" href="admin.php">admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



    


<!--<div class="container-fluid d-flex justify-content-center">-->
<!--    <div class="row d-flex justify-content-center">-->
<!--        --><?php //foreach ($vendors as &$data) { ?>
<!---->
<!--            <div class="col-lg-4">-->
<!--                <div class="m-5 shadow p-3 mb-5 bg-body-tertiary rounded text-center">-->
<!--                    --><?php //echo "<a href='master.php?id=" . $data['id'] . "'>";
//                    ?>
<!--                    <div class=" text-center fs-2 stroke text-light-emphasis">-->
<!--                        --><?php //echo $data["name"]; ?>
<!--                    </div>-->
<!--                    <img class="img-fluid p-5" src="/sd23-p01-reviewyourexperience-team-7/--><?php //echo $data["img"]; ?><!--"/>-->
<!--                    --><?php //echo "</a>" ?><!--    </div>-->
<!--            </div>-->
<!--        --><?php //} ?><!--    </div>-->
<!--        </div>-->



    <div class="container-fluid d-flex justify-content-center">
        <div class="row d-flex justify-content-center">
            <?php foreach ($vendors as &$data) { ?>

                <div class="col-lg-4">
                    <div class="m-5 shadow p-3 mb-5 bg-body-tertiary rounded text-center" >
                        <?php echo "<a href='master.php?vendors_id=" . $data['vendors_id'] . "'>"; ?>
                        <div class=" text-center fs-2 stroke text-light-emphasis">
                            <?php echo $data["name"]; ?>  ...     <?php echo $data["vendors_id"]; ?>              </div>
                        <img class="img-fluid" src="<?php echo $data["img"]; ?>"/>
                        <?php echo "</a>" ?>    </div>
                </div>
            <?php } ?>    </div>
    </div>



    <?php

//    echo '<div class="col-lg-4">';
//    echo ' <div class="card m-5 shadow p-3 mb-5 bg-body-tertiary rounded text-center">';
//    echo `<img class="card-img-top rounded" alt="..." src="`<?php echo $data["img"]; ?><!--`" />`;-->
<!--    echo '<div class="card-body">';-->
<!--    echo '<h5 class="card-title">--><?php //echo $data["name"]; ?><!--</h5>';-->
<!--    echo '<p class="card-text">Page made by team7</p>';-->
<!--    echo '<div class="d-grid">';-->
<!--    echo '<a  class="btn btn-outline-primary btn-lg" href='master.php?id=" . $data['id'] . "'>Go somewhere</a>';-->
<!--    echo '</div>';-->
<!--    echo '</div>';-->
<!--    echo '</div>';-->
<!--    echo '</div>';-->



    
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
