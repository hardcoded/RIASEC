<?php

  require_once "Model.php";

  /**
   * Classe permettant l'interaction avec la table "department"
   * Hérite de la classe Model
   * @author JohanBrunet
   */
  class DepartmentModel extends Model {

    /**
     * @var $pk_key clé primaire de la table
     */
    protected $pk_key = 'ID_department';
    /**
     * @var $table table de la base de données utilisée par la classe
     */
    protected $table = 'department';

    /**
     * Modification du sigle du département
     * @param int $id identifiant du département
     * @param string $newLabel nouveau sigle
     */
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

    /**
     * Sélection d'un département par son sigle
     * @param string $label sigle du département
     * @return array tableau associatif
     */
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
