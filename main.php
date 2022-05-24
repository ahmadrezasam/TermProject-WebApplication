<?php
session_start();
error_reporting(E_ERROR);
include "./includes/common.php";

//$_SESSION['executed'] ='yes';
if ($_SESSION['executed'] == 'yes') {
    require './controller/getAllClothes_controller.php';
}
else{
    echo("Unauthorized Access");
    exit;
}

if(!empty($_GET['gender'])){
    $gender = $_GET['gender'];
    try {
        $rs = $db->query("select * from clothes where gender like $gender");
        $clothes = $rs->fetchAll(PDO::FETCH_ASSOC);
        header("Refresh:0");
    } catch (PDOException $ex) {
        echo "<p>", $ex->getMessage(), "</p>";
    }
    
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <title>E-Commerce</title>
</head>

<body>
    <div class="navbar-fixed">
        <nav class="nav-wrapper indigo">
            <div class="container">
                <a href="#" class="brand-logo">E-Commerce</a>
                <a href="#" class="sidenav-trigger" data-target="mobile-links">
                    <i class="material-icons">menu</i>
                </a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="">Home</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Contact US</a></li>
                    <li><a href="./controller/logout_controller.php" class="btn white indigo-text">Logout</a></li>
                </ul>
            </div>
        </nav>
    </div>

    <ul class="sidenav" id="mobile-links">
        <li><a href="">Home</a></li>
        <li><a href="./controller/getJson_controller.php">JSON</a></li>
        <li><a href="">About</a></li>
    </ul>

    <!-- Page Layout here -->
    <div class="row dropdown">
        <form class="col s2 pinned" method="GET">
            <!-- Grey navigation panel -->
            <div action="#" style="margin-top: 80px; margin-bottom: 80px;">
                <p>
                    <label>
                        <input name="gender" type="radio" checked />
                        <span>Male</span>
                    </label>
                </p>
                <p>
                    <label>
                        <input name="gender" type="radio" />
                        <span>Female</span>
                    </label>
                </p>
            </div>

            <div class="input-field" >
                <select multiple>
                    <option value="" disabled selected>Size</option>
                    <option value="small">Small</option>
                    <option value="medium">Medium</option>
                    <option value="large">Large</option>
                </select>
                <label>Multiple Select</label>
            </div>

            <div class="row" style="margin-top: 80px;">
                <div class="col s5">
                    Price:
                    <div class="input-field inline">
                        <input id="min" type="text" class="validate">
                        <label for="min">Min</label>
                    </div>
                </div>
                <div class="col s5">
                    &nbsp
                    <div class="input-field inline">
                        <input id="max" type="text" class="validate">
                        <label for="max">Max</label>
                    </div>

                </div>
            </div>
        </form>

        <div class="col s9 offset-s3">
            <?php foreach ($clothes as $clothe) : ?>

                <div class="col s12 m4">
                    <!-- MEDIUM -->
                    <div class="card medium">
                        <div class="card-image">
                            <img style="height: 250px; object-fit: contain;" src="assets/Images/<?= $clothe["id"] ?>.jpg" alt="">
                        </div>
                        <div class="card-title indigo lighten-3 ">
                            <span style="display: block;text-align: center; margin-top:0px;"><?= $clothe["name"] ?></span>
                        </div>
                        <div class="card-content">
                            <p>Brand:&nbsp<?= $clothe["brand"] ?></p>
                            <p>Price:&nbsp<?= $clothe["price"] ?>TL</p>
                        </div>
                        <!-- <div class="card-action">
                            <a href="detail.php?id=<?= $game["id"] ?>" class="btn-small"><i class="material-icons">edit</i></a>
                        </div> -->
                    </div>
                </div>
            <?php endforeach ?>
        </div>

    </div>


    <!-- Compiled and minified JavaScript -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="assets/js/materialize.min.js"></script>
    <script>
        $(document).ready(function() {
            $('select').material_select(9)
        });

        $(document).ready(function() {
            $('.sidenav').sidenav();
        });
    </script>

</body>

</html>