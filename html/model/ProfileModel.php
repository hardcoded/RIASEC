<?php

  require_once "Model.php";

  class ProfileModel extends Model {

    protected $pk_key = 'ID_profile';
    protected $table = 'profile';

    public function getByType($type) {
      try {
        $sql = "SELECT * FROM ".$this->table." WHERE type = :type";
        $req = $this->query($sql,array(":type"=> $type));
        $res = $req->fetch(PDO::FETCH_ASSOC);
        return $res;
      }
      catch(PDOException $e){
        exit('<p>Erreur lors de la selection de l\'objet dans la table : '.$this->table
             .'<br/>'.$e->getMessage().'</p>');
      }
    }

    public function updateUrl($id, $newUrl) {
      try {
        $sql = 'UPDATE '.$this->table.' SET url_description = :url WHERE '.$this->pk_key.' = :id';
        $req = $this->query($sql, array(':url' => $newUrl,
                                        ':id' => $id));
      }
      catch (PDOException $e) {
        exit('<p>Erreur lors de la mise à jour dans la table : '.$this->table
             .'<br/>'.$e->getMessage().'</p>');
      }
    }
  }
?>
