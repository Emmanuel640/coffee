<?php
require_once "constants.php";
require_once "menuitems.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title<?php echo APPTITLE; ?></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <link href="css/shop.css" rel="stylesheet">
</head>
<body>
  <?php include_once "nav.php"; ?>

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="images/302899-350.jpg" alt="The most desirable">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="images/happy-350.jpg" alt="Always makes you happy">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="images/347144-350.jpg" alt="Looks beautiful">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <!-- Menu -->
        <div class="row">
          <?php
          $items = getMenuItems();
          foreach ($items as $item) {
            ?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a class="text-center" href="#"><i class="fas fa-coffee fa-10x"></i></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#"><?php echo htmlspecialchars($item["name"]); ?></a>
                  </h4>
                  <h5>$<?php echo number_format(htmlspecialchars($item["price"]),2); ?></h5>
                  <p class="card-text"><?php echo htmlspecialchars($item["description"]); ?></p>
                </div>
              </div>
            </div>
            <?php
          }
          ?>
        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-12 -->

    </div>
    <!-- /.row -->

    <div class="row">
      <div class="col-lg-8 col-md-8 mb-4">
        <h5><?php echo APPTITLE; ?></h5>
        <address>
          Av. Rafael Cordero Santiago<br/>
          Ponce, PR 00716
        </address>
        <h6>Opening Hours:</h6>
        Mon - Fri: 9:00am - 9pm<br/>
        Sat - Sun: 9:00am - 11:00pm
      </div>
      <div class="col-lg-4 col-md-6 mb-4">
        <blockquote class="blockquote text-right">
          <p class="mb-0">I have measured out my life with coffee spoons.</p>
          <footer class="blockquote-footer">T.S. Eliot</footer>
        </blockquote>
      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; 2018</p>
    </div>
    <!-- /.container -->
  </footer>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
