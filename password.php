<?php

require_once "db.php";
require_once "constants.php";

$pdo = new PDO($dsn, $dbuser, $dbpass);

function validatePassword($username, $password) {
     // Buscar la data de la base de datos para validar el usuario
     global $pdo;
     // Preparar el query con parametros
     $sql = "SELECT * FROM users WHERE username = ?";
     $stmt = $pdo->prepare($sql);
     // Ejecutar el query con parametros
     $stmt->execute([$username]);
    // Obtener el primer record
     $user = $stmt->fetch(PDO::FETCH_OBJ);
     // Si encontro algun record, validar el password
     if ($user){
        $hash = $user->password;
        if (password_verify($password, $hash)) {
          // Guardar en la session el id del usuario
          $_SESSION[USERID] = $user->id;
          $_SESSION[USERNAME] = $user->username;
          return true;
        }
     }
     return false;
}
?>
