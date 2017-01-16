<?php

  require_once "Model.php";

  /**
   * Classe permettant l'interaction avec la table "result"
   * Hérite de la classe Model
   * @author JohanBrunet
   */
  class ResultModel extends Model {

    /**
     * @var $table table de la base de données utilisée par la classe
     */
    protected $table = 'result';

    public function storeResult($student, $results) {
      $sql = "INSERT INTO ".$this->table." (student, type, percentage) VALUES (:student, :type, :percentage)";
      foreach ($results as $result) {
        try {
          $req = $this->query($sql, array(':student' => $student['ID_student'],
                                          ':type' => $result['type'],
                                          ':percentage' => $result['percentage']));
        }
        catch(PDOException $e){
          exit('<p>Erreur lors de l\'insertion des données dans la table : '.$this->table
               .'<br/>'.$e->getMessage().'</p>');
        }
      }
    }

    public function getByStudent($studentID) {
      try {
        $sql = "SELECT * FROM ".$this->table." WHERE student = :student";
        $req = $this->query($sql, array(':student' => $studentID));
        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
      }
      catch(PDOException $e){
        exit('<p>Erreur lors de l\'insertion des données dans la table : '.$this->table
             .'<br/>'.$e->getMessage().'</p>');
      }
    }
  }
?>
