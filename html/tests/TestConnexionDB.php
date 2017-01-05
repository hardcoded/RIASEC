<?php
  require_once "../model/DatabaseConnection.php";

  $db = DatabaseConnection::getInstance();
  $stmt = $db->prepare('SELECT * FROM proposition;');
  $stmt->execute();
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
      $i = 1;
      for($i; $i <= 12; $i++) {
        echo "<div><p style='text-align:center'> Groupe $i</p></div>";
    ?>
    <table style="border-collapse: collapse" width="100%">
      <tbody>
        <tr>
          <th><label></label></th>
          <th><label></label></th>
          <th><label>1°</label></th>
          <th><label>2°</label></th>
          <th><label>3°</label></th>
        </tr>
    <?php
      foreach ($data as $value) {
        if ($i == $value['groupe']) {
          echo "groupe ".$value['groupe'];
    ?>
      <tr>
        <td><?php echo $value['ID_proposition'] ?></td>
        <td style="border: 1px solid"><?php echo $value['label_proposition']?></td>
        <td style="border: 1px solid"><input type="checkbox" class="checkbox1" name="checkbox" id="1<?php echo $value['ID_proposition'] ?>"/></td>
        <td style="border: 1px solid"><input type="checkbox" class="checkbox1" name="checkbox" id="2<?php echo $value['ID_proposition'] ?>"/></td>
        <td style="border: 1px solid"><input type="checkbox" class="checkbox1" name="checkbox" id="3<?php echo $value['ID_proposition'] ?>"/></td>
      </tr>
  <?php
      }
    }
  }
  ?>

      </tbody>
    </table>


  </body>
</html>
