<?php
  require_once "db.php";

  $pdo = new PDO($dsn, $dbuser, $dbpass);

  function getMenuItems() {
    global $pdo;
    $sql = "SELECT * FROM menuitems";
    $stmt = $pdo->query($sql);
    return $stmt;
  }
 ?>
