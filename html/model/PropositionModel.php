<?php

  require_once "Model.php";

  class PropositionModel extends Model {

    protected $pk_key_id = 'ID_proposition';
    protected $pk_key_grp = 'groupe';
    protected $table = 'proposition';

    function editLabel($id, $group, $newLabel) {
      try {
        $sql = 'UPDATE '.$this->table.' SET label_proposition = :newLabel WHERE '.$this->pk_key_id.' = :id AND '.$this->pk_key_grp.' = :group;';
        $this->query($sql, array(":newLabel" => $newLabel,
                                 ":id" => $id,
                                 ":group" => $group));
      }
      catch (PDOException $e) {
        echo($e->getMessage());
        die("<br> Erreur lors de la recherche de tous les objets de la table" . $this->table);
      }
    }
  }

  function getByGroup($group) {
    try {
      $sql = 'SELECT * FROM '.$this->table.' WHERE '.$this->pk_key_group.' = :group;';
      $this->query($sql, array(":group" => $group));
    }
    catch (PDOException $e) {
      echo($e->getMessage());
      die("<br> Erreur lors de la recherche de tous les objets de la table" . $this->table);
    }
  }
?>
