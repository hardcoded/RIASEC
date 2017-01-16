<?php

  require_once "Model.php";

  class ResultModel extends Model {

    protected $table = 'result';

    public function storeResult($student, $results) {
      $sql = "INSERT INTO ".$this->table." (student, profile, percentage) VALUES (:student, :type, :percentage)";
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
        //var_dump($student['ID_student']);
        //var_dump($result['type']);
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

    public function deleteByStudent($studentID) {
      try {
        $sql = "DELETE FROM ".$this->table." WHERE student = :student";
        $req = $this->query($sql, array(':student' => $studentID));
      }
      catch(PDOException $e){
        exit('<p>Erreur lors de l\'insertion des données dans la table : '.$this->table
             .'<br/>'.$e->getMessage().'</p>');
      }
    }
  }
?>
