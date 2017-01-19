<?php

  require_once "Model.php";

  /**
   * Classe permettant l'interaction avec la table "prom"
   * Hérite de la classe Model
   * @author JohanBrunet
   */
  class PromModel extends Model {

    /**
     * @var $pk_key clé primaire de la table
     */
    protected $pk_key = 'ID_prom';
    /**
     * @var $table table de la base de données utilisée par la classe
     */
    protected $table = 'prom';

    /**
     * Création d'une nouvelle promotion
     * @param array $prom Tableau contenant les informations sur la promotion
     * @return int ID du nouvel enregistrement
     */
    public function createProm($prom) {
      try {
        $sql = "INSERT INTO ".$this->table." (department, year_prom, graduation_year) VALUES (:dep, :year, :grad)";
        $req = $this->query($sql, array(':dep' => $prom['department'],
                                        ':year' => $prom['year'],
                                        ':grad' => $prom['graduation']));
        return $this->database->lastInsertId();
      }
      catch(PDOException $e){
        exit('<p>Erreur lors de l\'insertion des données dans la table : '.$this->table
             .'<br/>'.$e->getMessage().'</p>');
      }
    }

    /**
     * Supprimer une promotion
     * @param int $promID Identifiant de la promotion à supprimer
     */
    public function deleteProm($promID) {
      $sql = "DELETE FROM ".$this->table." WHERE ".$pk_key." = :promID";
      $req = $this->query($sql, array(':promID' => $promID));
    }

    /**
     * Vérifier si une promotion existe
     * @param array $promo informations sur la promotion à vérifier
     * @return int identifiant de la promotion si elle existe, -1 sinon
     */
    public function checkProm($promo) {
      $proms = $this->getAll();

      foreach ($proms as $prom) {
        if (($prom['department'] == $promo['department']) && ($prom['year_prom'] == $promo['year']) && $prom['graduation_year'] == $promo['graduation']) {
          $res = $prom['ID_prom'];
          break;
        }
        else {
          $res = -1;
        }
      }
      return $res;
    }
  }
?>
