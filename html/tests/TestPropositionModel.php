<?php
  require_once "../model/PropositionModel.php";

  $pm = new PropositionModel;
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>TestBD</title>
  </head>
  <body>
    <?php
      for ($i = 1; $i <= 12; $i++) {
        $propositions = $pm->getByGroup($i);
        var_dump($propositions);
      }
    ?>
  </body>
</html>
