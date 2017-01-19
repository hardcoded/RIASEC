<?php

  require_once "Model.php";

  /**
   * Classe permettant l'interaction avec la table "proposition"
   * Hérite de la classe Model
   * @author JohanBrunet
   */
  class PropositionModel extends Model {

    /**
     * @var $pk_key_id première clé primaire de la table
     */
    protected $pk_key_id = 'ID_proposition';
    /**
     * @var $pk_key_grp seconde clé primaire de la table
     */
    protected $pk_key_grp = 'groupe';
     /**
     * @var $table table de la base de données utilisée par la classe
     */
    protected $table = 'proposition';

    /**
     * Modifier l'intitulé d'une question
     * @param string $id identifiant de la question
     * @param int $group groupe auquel appartient la question
     * @param string $newLabel nouvel intitulé de la question
     */
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

    /**
     * Récupération des questions du même groupe
     * @param int $group identifiant du groupe de questions à récupérer
     * @return array tableau associatif contenant les questions du groupe
     */
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
