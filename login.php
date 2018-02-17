<?php
session_start();
require_once "password.php";
require_once "constants.php";

$action = (isset($_GET["action"])) ? htmlspecialchars($_GET["action"]) : '';

if ($action === "logout") {
    session_destroy();
    header("Location: " . BASEURL);
    exit();
}


// Si ya ha una session iniciada, redirigir a la pagina de administracion
if (isset($_SESSION[USERID])) {
    $url = BASEURL;
    $url .= "/admin/home.php";
    header("Location: " . $url);
    exit();
}

// Flag para mostrar mensaje si los credenciales son invalidos
$validLogin = true;

$username = "";

// Verificar si esas variables estan presentes
if ((isset($_POST["username"])) && (isset($_POST["password"]))) {
    // Declarar variables usuario y password
    $username = $_POST["username"];
    $password = $_POST["password"];
    if (validatePassword($username, $password)) {
        // Redirigir a la pagina de administracion
        header("Location:" . BASEURL . "/admin/home.php");
        // Terminar ejecucion
        exit();
    }
    else {
        $validLogin = false;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo APPTITLE; ?></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <link href="css/shop.css" rel="stylesheet">
</head>
<body>
  <?php include_once "nav.php"; ?>

  <div class="container" style="padding-top: 60px;">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="fas fa-sign-in-alt"></i> Administration Login</h3>
          </div>
          <div class="panel-body">
            <?php if (!$validLogin) { ?>
              <p class="alert alert-danger">Invalid username or password</p>
            <?php } ?>
            <form method="post" accept-charset="UTF-8" role="form">
              <fieldset>
                <div class="form-group">
                  <input class="form-control" placeholder="Username" name="username" type="text" value="<?php echo $username; ?>">
                </div>
                <div class="form-group">
                  <input class="form-control" placeholder="Password" name="password" type="password">
                </div>
                <input class="btn btn-lg btn-default btn-block" type="submit" value="Login">
              </fieldset>
            </form>
          </div>
          <!-- /.panel-body -->
        </div>
        <!-- /.panel .panel-default -->
      </div>
      <!-- ./col-md-6 -->
      <div class="col-md-3"></div>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
