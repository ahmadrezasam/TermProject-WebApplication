<?php
session_start();
error_reporting(E_ERROR);
include "./includes/common.php";

//$_SESSION['executedAdmin'] = 'yes';
if ($_SESSION['executedAdmin'] == 'yes') {
  require './controller/getAllClothes_controller.php';
} else {
  echo ("Unauthorized Access");
  exit;
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
        <a href="#" class="brand-logo">Online Shopping - Admin</a>
        <a href="#" class="sidenav-trigger" data-target="mobile-links">
          <i class="material-icons">menu</i>
        </a>
        <ul class="right hide-on-med-and-down">
          <li><a href="">Home</a></li>
          <li><a href="add.php">Add Clothes</a></li>
          <li><a href="./controller/getJson_controller.php">Json</a></li>
          <li><a href="./controller/logout_controller.php" class="btn white indigo-text">Logout</a></li>
        </ul>
      </div>
    </nav>
  </div>

  <ul class="sidenav" id="mobile-links">
    <li><a href="">Home</a></li>
    <li><a href="json.php">JSON</a></li>
    <li><a href="">About</a></li>
  </ul>

  <!-- Page Layout here -->
  <div class="row dropdown">
    <div class="col s2 pinned">
      <!-- Grey navigation panel -->
      <div action="#" style="margin-top: 80px; margin-bottom: 80px;">
        <p>
          <label>
            <input name="group1" type="radio" checked />
            <span>Male</span>
          </label>
        </p>
        <p>
          <label>
            <input id="idFemale" name="group1" type="radio" />
            <span>Female</span>
          </label>
        </p>
      </div>

      <div class="input-field">
        <select multiple id="size">
          <option value="" disabled selected>Size</option>
          <option value="">Small</option>
          <option value="">Medium</option>
          <option value="">Large</option>
        </select>
        <label>Multiple Select</label>
      </div>

      <div class="row" style="margin-top: 80px;">
        <div class="col s5">
          Price:
          <div class="input-field inline">
            <input id="email_inline" type="email" class="validate">
            <label for="email_inline">Min</label>
          </div>
        </div>
        <div class="col s5">
          &nbsp
          <div class="input-field inline">
            <input id="email_inline" type="email" class="validate">
            <label for="email_inline">Max</label>
          </div>

        </div>
      </div>
    </div>

    <div id = "result" class="col s9 offset-s3" >
      <?php foreach ($clothes as $clothe) : ?>
        <div class="col s12 m4" id="clothes">
          <!-- MEDIUM -->
          <div class="card large">
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
            <div class="card-action">
              <button onClick='deleteGame(<?= $clothe["id"] ?>)' class="btn-small"><i class="material-icons">delete</i></button>
              <a href="edit.php?id=<?= $clothe["id"] ?>" class="btn-small" style="float: right;"><i class="material-icons">edit</i></a>
            </div>
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
      $('select').material_select(9);
      $('#idFemale').click(function(){
        var size = $('#size').val();
        $.get("getFlterClothes.php",{gender:'female',sze:size} function(data){
          $("#result").html(data);
        })
      })
    });

    $(document).ready(function() {
      $('.sidenav').sidenav();
    });



    function deleteGame(id) {
      $.post("./controller/deleteClothes_controller.php", {
          "id": id
        },
        function(data) {
          $("#clothes").remove(data);
        }
      );
      
    }
  </script>

</body>

</html>