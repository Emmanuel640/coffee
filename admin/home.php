<?php
session_start();

require_once "../constants.php";
require_once "../menuitems.php";

if (!isset($_SESSION[USERID])) {
  header("Location: " . BASEURL . "/login.php");
  exit();
}
$username = htmlspecialchars($_SESSION[USERNAME]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo APPTITLE; ?></title>
  <link href="../css/shop.css" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="<?php echo BASEURL; ?>"><i class="fas fa-coffee fa-2x"></i> <?php echo APPTITLE; ?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <span class="navbar-text">
            <i class="fas fa-user fa-lg"></i> Welcome <a href="../login.php?action=logout" title="Sign out"><?php echo $username; ?></a>!
          </span>
        </ul>
      </div>
      <!-- /.navbarResponsive -->
    </div>
    <!-- /.container -->
  </nav>

  <div class="container pt-5">
    <div class="row">
      <div class="col">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="menu-tab" data-toggle="tab" href="#menu" role="tab" aria-controls="menu" aria-selected="true">Menu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="quotes-tab" data-toggle="tab" href="#quotes" role="tab" aria-controls="quotes" aria-selected="false">Quotes</a>
          </li>
        </ul>
        <div class="tab-content pt-5"" id="myTabContent">
          <!-- Menu items -->
          <div class="tab-pane fade show active" id="menu" role="tabpanel" aria-labelledby="menu-tab">
            <?php
            $items = getMenuItems();
            if ($items) {
              ?>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $counter = 1;
                  foreach ($items as $item) {
                    ?>
                    <tr>
                      <td><a href="#"><?php echo $counter; $counter++; ?></a></td>
                      <td><?php echo htmlspecialchars($item["name"]); ?></td>
                      <td><?php echo htmlspecialchars($item["description"]); ?></td>
                      <td>$<?php echo number_format(htmlspecialchars($item["price"]),2); ?></td>
                    </tr>
                    <?php
                  }
                  ?>
                </tbody>
              </tfoot>
            </tfoot>
          </table>
          <?php
        }
        else {
          ?>
          <p class="lead pt-3">No menu items at this moment... <i class="far fa-frown"></i></p>
        <?php }
        ?>
      </div>
      <!-- /Menu items -->

      <!-- Quotes -->
      <div class="tab-pane fade" id="quotes" role="tabpanel" aria-labelledby="quotes-tab">
        <p class="lead pt-3">No quotes at this moment... <i class="far fa-frown"></i></p>
      </div>
      <!-- /Quotes -->
    </div>
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
</div>
<!-- /.container -->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
