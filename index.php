
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
    <link rel="icon" href="favicon.png" type="image/gif" sizes="16x16">
</head>

<body>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="assets/js/materialize.min.js"></script>

    <div class="navbar-fixed">
        <nav class="nav-wrapper indigo">
            <div class="container">
                <a href="#" class="brand-logo">E-Commerce</a>
                <a href="signup.php" class="btn white indigo-text right" style="margin-top: 15px;">Register</a> 
            </div>
        </nav>
    </div>
    <section style="margin-top: 50px;">
        <div class="container">
            <div class="row mr-top">
                <div class="col s3"></div>
                <div class="col s6">
                    <form action="controller/signin_controller.php" method="GET">
                        <div class="card">
                            <div class="card-image">
                                <span class="card-title">Login</span>
                            </div>
                            <div class="card-content">
                                <div class="row">
                                    <div class="row">
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
                                    </div>
                                </div>
                            </div>
                            <div class="card-action ta-right">
                                <button class="btn waves-effect waves-light" type="submit" name="action">Login
                                    <i class="material-icons right">login</i>
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