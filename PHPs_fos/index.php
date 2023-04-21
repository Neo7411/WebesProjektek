<?php

if(isset($_GET["redirect"]) && isset($_GET["delay"])){
    header("Refresh: ".$_GET["delay"]."; url=https://".$_GET["redirect"]);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-blue-Gradient-Blue-gradient-login-form.css">
    <link rel="stylesheet" href="assets/css/Login-Form-blue-Gradient.css">
    <link rel="stylesheet" href="assets/css/Login-Red.css">
</head>

<body>
    <section>
        <div class="lgp-hd">
            <h2><strong>Projekt2</strong></h2>
            <h6><sup>A sikeres belépésnél a lakat színe változik!</sup></h6>
        </div>
        <div class="container login-cont">
            <div class="row">
                <div class="col-10 col-sm-6 col-md-4 col-lg-4 offset-1 offset-sm-3 offset-md-4 offset-lg-4 login-col"><i <?php if(isset($_GET["Titkos"])){ echo 'style=color:'.$_GET["Titkos"].';"'; } ?> class="icon ion-lock-combination"></i>
                    <h3 class="text-center" style="color:whitesmoke"><?php if(isset($_GET["response"])){ echo $_GET["response"]; } ?></h3>
                    <form class="login-form" method="post" action="login.php">
                        <div class="form-group mb-3"><input class="form-control lg-frc form-control-lg" type="email" name="uname" placeholder="Username"></div>
                        <div class="form-group mb-3"><input class="form-control form-control-lg lg-frc" type="password" required="" placeholder="Password" name="passwd"></div>
                        <div class="form-group mb-3"><button class="btn btn-light btn-lg login-btn" type="submit" style="border: 1px whitesmoke solid;"><strong>Login</strong></button></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>