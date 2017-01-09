<?php

  require_once "Model.php";

  class PropositionModel extends Model {

    protected $pk_key_id = 'ID_proposition';
    protected $pk_key_grp = 'groupe';
    protected $table = 'proposition';

    public function editLabel($id, $group, $newLabel) {
      try {
        $sql = "UPDATE ".$this->table." SET label_proposition = :newLabel WHERE ".$this->pk_key_id." = :id AND ".$this->pk_key_grp." = :group;";
        $this->query($sql, array(":newLabel" => $newLabel,
                                 ":id" => $id,
                                 ":group" => $group));
      }
      catch (PDOException $e) {
        echo($e->getMessage());
        die("<br> Erreur lors de la mise à jour de la table " .$this->table);
      }
    }

  public function getByGroup($group) {
    try {
      $sql = "SELECT * FROM ".$this->table." WHERE ".$this->pk_key_grp." = :group";
      $req = $this->query($sql,array(":group"=> $group));
      $res = $req->fetchAll(PDO::FETCH_ASSOC);
      return $res;
    }
    catch(PDOException $e){
      exit('<p>Erreur lors de la selection de l\'objet dans la table : '.$this->table
           .'<br/>'.$e->getMessage().'</p>');
    }
  }
}
?>
