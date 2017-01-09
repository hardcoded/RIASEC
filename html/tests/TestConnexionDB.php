<?php
  require_once "../model/DatabaseConnection.php";

  $db = DatabaseConnection::getInstance();
  $stmt = $db->prepare('SELECT * FROM proposition WHERE groupe = :group');
  $i = 3;
  $stmt->execute(array(':group' => $i));
  $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>TestBD</title>
  </head>
  <body>
    <?php
      var_dump($data);
    ?>
  </body>
</html>
