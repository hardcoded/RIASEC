<?php
  require_once "../model/ProfileModel.php";

  $pm = new ProfileModel();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>TestBD</title>
  </head>
  <body>
    <?php
      $profiles = $pm->getAll();

      echo 'Before edit <br />';
      foreach ($profiles as $profile) {
        echo $profile['type'].' - '.$profile['url_description'];
        echo '<br />';
        $newUrl = $profile['url_description']."/testEdit";
        $pm->updateUrl($profile['ID_profile'], $newUrl);
      }

      $p = $pm->getAll();
      echo '<br /><br />';

      echo 'After edit <br />';
      foreach ($p as $profile) {
        echo $profile['type'].' - '.$profile['url_description'];
        echo '<br />';
        $newUrl = rtrim($profile['url_description'],"/testEdit");
        $pm->updateUrl($profile['ID_profile'], $newUrl);
      }

      $prof = $pm->getAll();
      echo '<br /><br />';

      echo 'After re-edit <br />';
      foreach ($prof as $profile) {
        echo $profile['type'].' - '.$profile['url_description'];
        echo '<br />';
      }
    ?>
  </body>
</html>
