<?php

  function __autoload($className) { require_once "$className.php"; }
  $db = DatabaseConnection::getInstance();

  $stmt = $bd->prepare("SELECT * FROM proposition;");
  $res = $stmt->execute();
  $res->fetch();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>TestBD</title>
  </head>
  <body>
    <?php print_r($res); ?>
  </body>
</html>
