<?php
    include 'includes/common.php';
    $message = "";
    if(!empty($_POST)){
        $message = "";

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $pattern = "^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S^";
        if(!preg_match($pattern, $password)){
            $message = "The password must be 8 chars including \r\n
            at least one lowercase letter,
            at least one uppercase letter,
            and at least one number in it";
        }else{
            $sql = "insert into user (name, email, password) value(?,?, ?)";
            $stmt = $db->prepare($sql);
            $affected = $stmt->execute([$name, $email, $password]);
            if(!$affected){
              echo "<p>Insert error ".$db->errorInfo()."</p>";
              exit;
            }
        
            echo "<script type='text/javascript'>location.href = './index.php';</script>";
        }
    } 
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="assets/css/materialize.min.css" media="screen,projection" />

    <!-- customize css -->
    <link href="assets/css/style.css" rel="stylesheet" />

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Shopping</title>
</head>

<body>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="assets/js/materialize.min.js"></script>

    <div class="navbar-fixed">
        <nav class="nav-wrapper indigo">
            <div class="container">
                <a href="#" class="brand-logo">E-Commerce</a>
                <a href="index.php" class="btn white indigo-text right" style="margin-top: 15px;">Login</a>
            </div>
        </nav>
    </div>
    <section style="margin-top: 50px;">
        <div class="container">
            <div class="row mr-top">
                <div class="col s3"></div>
                <div class="col s6">
                    <form action="" method="post">
                        <div class="card">
                            <div class="card-image">
                                <span class="card-title">Sign Up</span>
                            </div>
                            <div class="card-content">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix pf-fix">account_circle</i>
                                        <input id="first_name" name="name" type="text" class="validate" required>
                                        <label for="password">Name</label>
                                    </div>

                                    <div class="input-field col s12 inline">
                                        <i class="material-icons prefix pf-fix">email</i>
                                        <input id="email" name="email" type="email" class="validate" required>
                                        <label for="email" data-error="wrong" data-success="right">Email</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix pf-fix">lock</i>
                                        <input id="password" name="password" type="password" class="validate" required>
                                        <label for="password">Password</label>
                                    </div>
                                    <?php echo "<div style='color: red;'>". $message ."</div>"; ?>
                                </div>
                            </div>
                            <div class="card-action ta-right">
                                <button class="btn waves-effect waves-light" type="submit" name="action">Sign Up
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col s3"></div>
            </div>
        </div>
    </section>
</body>

</html>