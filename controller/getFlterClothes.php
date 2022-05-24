<?php
try {

  extract($_GET);
  $filter = !isset($filter)?'male':$filter;
  $sze = !isset($sze)?'small':$sze;
    $stmt = $db->prepare("select * from clothes where gender=? and size = ?");
    $rs = $stmt -> execute([$filter, $sze]);
    $clothes = $rs->fetchAll(PDO::FETCH_ASSOC);

    
    foreach ($clothes as $clothe) : ?>
      <div class="col s12 m4" class="clothes">
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
  



    
} catch (PDOException $ex) {
    echo "<p>", $ex->getMessage(), "</p>";
}
