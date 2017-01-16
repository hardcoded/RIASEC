<?php

  require_once "Model.php";

  /**
   * Classe permettant l'interaction avec la table "profile"
   * Hérite de la classe Model
   * @author JohanBrunet
   */
  class ProfileModel extends Model {

    /**
     * @var $pk_key clé primaire de la table
     */
    protected $pk_key = 'ID_profile';
    /**
     * @var $table table de la base de données utilisée par la classe
     */
    protected $table = 'profile';

    /**
     * Sélection d'un type par son initiale
     * @param string $type initiale du type à récupérer
     * @return array tableau associatif
     */
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

    /**
     * Modification du chemin d'accès au fichier de description
     * @param int $id identifiant du type
     * @param string $newUrl nouveau chemin d'accès au fichier
     */
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
