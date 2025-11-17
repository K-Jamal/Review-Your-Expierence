<?php
$db = new PDO("mysql:host=localhost;dbname=rye1", 'root', '');
$vendors_id=$_GET['vendors_id'];


$query = $db->prepare("SELECT * FROM products WHERE vendors_id=". $vendors_id);
$query->execute();


$vendors = $query->fetchAll(PDO::FETCH_ASSOC); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>


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



<!---->
<!--<div class="container-fluid d-flex justify-content-center" >-->
<!--    <div class="row d-flex justify-content-center">-->
<!---->
<!--        --><?php
//        foreach ($vendors as &$data) {
//            ?>
<!--            <div class="col-lg-2 mx-5">-->
<!--                <div class="card m-5 bg-secondary shadow-lg stroke text-white" style="--bs-bg-opacity: .7;"> --><?php //echo "<a href='Information.php?id=" . $data['id'] . "'>"; ?>
<!--                    <div class=" text-center text-light-emphasis">-->
<!--                        --><?php
//                        echo $data["name"];
//                        ?>
<!--                    </div>-->
<!---->
<!--                    <img class="img-fluid" src="--><?php //echo $data["img"]; ?><!--"/>-->
<!---->
<!--                    <div class="card-body text-light-emphasis text-border border-black bg-secondary" style="--bs-bg-opacity: .7;">-->
<!--                        --><?php
//                        echo $data["desc"];
//                        ?>
<!--                    </div>--><?php //echo "</a>" ?>
<!--                </div>-->
<!--            </div>-->
<!--            --><?php
//        }
//        ?>

<?php
    foreach ($vendors as &$data){
//        echo "<a href='detail.php?id=". $data['id']."'> ";
//        echo $data['name']. " " . $data['price']. " >>>>>>>>>>>" . $data['id'];
//        echo "</a>";
//        echo" <br>";



        //shows the cards in the browser
        echo ' <div class="col-lg-4">';
        echo ' <div class="card m-5 shadow p-3 mb-5 bg-body-tertiary rounded">';
        echo ' <img src="/sd23-p01-reviewyourexperience-team-7/img/' . htmlspecialchars($data['img']). '" class="img-fluid rounded-start" alt="Card img" />'; //db data img
        echo ' <div class="card-body">';
        echo ' <h5 class="card-title text-center">'. htmlspecialchars($data['name']) .'</h5>';
        echo ' <p class="card-text text-center"> Page made by Team Info</p>';
        echo ' <div class="d-grid">';
        echo ' <a class="btn btn-outline-primary btn-lg stretched-link" href="detail.php?id='. $data['id'].'" > ';
        echo ' See details';
        echo ' </a>';
        echo ' </div>';
        echo ' </div>';
        echo ' </div>';
        echo ' </div>';
    }

?>


    </div>
</div>


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