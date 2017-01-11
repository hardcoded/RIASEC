<?php

  require_once "Model.php";

  class PromModel extends Model {

    protected $pk_key = 'ID_prom';
    protected $table = 'prom';

    public function createProm($prom) {
      try {
        $sql = "INSERT INTO ".$this->table." (department, year_prom, graduation_year) VALUES (:dep, :year, :grad)";
        $req = $this->query($sql, array(':dep' => $prom['department'],
                                        ':year' => $prom['year'],
                                        ':grad' => $prom['graduation']));
      }
      catch(PDOException $e){
        exit('<p>Erreur lors de l\'insertion des données dans la table : '.$this->table
             .'<br/>'.$e->getMessage().'</p>');
      }
    }

    public function deleteProm($promID) {
      $sql = "DELETE FROM ".$this->table." WHERE ".$pk_key." = :promID";
      $req = $this->query($sql, array(':promID' => $promID));
    }
  }
?>
