<?php
session_start();
error_reporting(E_ERROR);
include "./includes/common.php";

//$_SESSION['executedAdmin'] = 'yes';
if ($_SESSION['executedAdmin'] == 'yes') {
    $id = $_GET["id"];
    try {
        $rs = $db->prepare("select * from clothes where id = ?");
        $rs->execute([$id]);
        $clothe = $rs->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $ex) {
    }

    if (!empty($_POST)) {
        extract($_POST);
        $image = "";
        $sql = "update clothes set name = ?, brand= ?, gender = ?, size = ?, price = ?, amount = ?, image = ?, color = ? where id = ?";
            $rs = $db->prepare($sql);
            $rs->execute([$name, $brand, $gender, $size, $price, $amount, $image, $color, $id]);
        try {
            
        } catch (PDOException $ex) {
        }
        header("Location: admin.php");
        exit;
    }
} else {
    // echo ("Unauthorized Access");
    // exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Shopping</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>

<body>
    <div class="card-panel indigo lighten-2 white-text md40">
        <h4 class="center">Edit Clothes</h4>
    </div>
    <div class="row">
        <form class="col s12" method="POST">
            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="Name" id="name" type="text" class="validate" value="<?= $clothe["name"] ?>" name="name">
                    <label for="name">Name</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="Brand" id="brand" type="text" class="validate" value="<?= $clothe["brand"] ?>" name="brand">
                    <label for="brand">brand</label>
                </div>
            </div>
            <div class="row" style="margin-top: 100px;">
                <div class="input-field col s6">
                    <div>
                        <div>Choose Gender:
                            <label style="margin-left: 50px;">
                                <input type="radio" name="gender" value="male" <?php echo (strtolower($clothe["gender"]) == 'male') ? 'checked' : '' ?> />
                                <span>Male</span>
                            </label>
                            <label style="margin-left: 20px;">
                                <input type="radio" name="gender" value="female" <?php echo (strtolower($clothe["gender"]) == 'female') ? 'checked' : '' ?> />
                                <span>Female</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="input-field col s6">
                    <select name="size">
                        <option value="" disabled selected>Size</option>
                        <option value="small" <?php if (strtolower($clothe['size']) == 'small') echo ' selected="selected"'; ?>>Small</option>
                        <option value="medium" <?php if (strtolower($clothe['size']) == 'medium') echo ' selected="selected"'; ?>>Medium</option>
                        <option value="large" <?php if (strtolower($clothe['size']) == 'large') echo ' selected="selected"'; ?>>Large</option>
                    </select>
                    <label>Sizes</label>
                </div>
            </div>
            <div class="row" style="margin-top: 60px;">
                <div class="input-field col s3">
                    <input placeholder="Price" id="price" type="text" class="validate" value="<?= $clothe["price"] ?>" name="price">
                    <label for="price">Price</label>
                </div>
                <div class="input-field col s3 " style="left: 200px;">
                    <input placeholder="Amount" id="amount" type="text" class="validate" value="<?= $clothe["amount"] ?>" name="amount">
                    <label for="amount">Amount</label>
                </div>
                <div class="input-field col s3 right">
                    <input placeholder="Color" id="color" type="text" class="validate" value="<?= $clothe["color"] ?>" name="color">
                    <label for="color">Color</label>
                </div>
            </div>

            <div class="center">
                <button class="btn waves-effect waves-light" type="submit" name="action">Update
                    <i class="material-icons right">edit</i>
                </button>
            </div>
        </form>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="assets/js/materialize.min.js"></script>
    </div>
    <script>
        $('select').material_select(5);
    </script>
</body>

</html>