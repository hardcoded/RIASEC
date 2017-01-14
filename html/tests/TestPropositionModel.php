<?php
  require_once "../model/PropositionModel.php";

  $pm = new PropositionModel();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>TestBD</title>
  </head>
  <body>
    <?php
      $array = array();
      for ($i = 1; $i <= 12; $i++) {
        $propositions = $pm->getByGroup($i);
         echo "<h2>Groupe n° $i</h2>";
        $p = array();
        foreach ($propositions as $prop) {
          // echo $prop['ID_proposition'].' : '.$prop['label_proposition'];
          // echo '<br />';
          $p[] = $prop['label_proposition'];
        }
        $array[$i] = $p;
      }
    ?>
  </body>
</html>
