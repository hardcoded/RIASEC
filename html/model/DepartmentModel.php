<?php

  require_once "Model.php";

  class DepartmentModel extends Model {

    protected $pk_key = 'ID_department';
    protected $table = 'department';

    public function editLabel($id, $newLabel) {
      try {
        $sql = 'UPDATE '.$this->table.' SET label_department = :label WHERE '.$this->pk_key.' = :ID_department';
        $req = $this->query($sql, array(':label' => $newLabel,
                                        ':ID_department' => $id));
      }
      catch (PDOException $e) {
        exit('<p>Erreur lors de la mise à jour dans la table : '.$this->table
             .'<br/>'.$e->getMessage().'</p>');
      }
    }

    public function getByLabel($label) {
      try {
        $sql = "SELECT * FROM ".$this->table." WHERE label_department = :label";
        $req = $this->query($sql,array(":label"=> $label));
        $res = $req->fetch(PDO::FETCH_ASSOC);
        return $res;
      }
      catch(PDOException $e){
        exit('<p>Erreur lors de la selection de l\'objet dans la table : '.$this->table
             .'<br/>'.$e->getMessage().'</p>');
      }
    }
  }
?>
