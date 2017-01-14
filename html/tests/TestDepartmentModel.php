<?php
  require_once "../model/DepartmentModel.php";

  $dm = new DepartmentModel();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>TestBD</title>
  </head>
  <body>
    <?php
      $deps = $dm->getAll();
      var_dump($deps);
      echo '<br /><br />';
      $ig = $dm->getByLabel("IG");
      var_dump($ig);
      echo '<br /><br />';

      $dm->editLabel($ig['ID_department'], "IGT");
      $ig = $dm->getByLabel("IGT");
      var_dump($ig);
      echo '<br /><br />';

      $dm->editLabel($ig['ID_department'], "IG");
      $ig = $dm->getByLabel("IG");
      var_dump($ig);
    ?>
  </body>
</html>
