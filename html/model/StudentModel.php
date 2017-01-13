<?php

  require_once "Model.php";

  class StudentModel extends Model {

    protected $pk_key = 'ID_student';
    protected $table = 'student';

    public function createStudent($student) {
      try {
        $sql = 'INSERT INTO '.$this->table.' (login, password, first_name, last_name, prom) VALUES (:login, :password, :first_name, :last_name, :prom)';
        $req = $this->query($sql, array(':login' => $student['login'],
                                        ':password' => $student['password'],
                                        ':first_name' => $student['firstName'],
                                        ':last_name' => $student['lastName'],
                                        ':prom' => $student['promID']));
      }
      catch(PDOException $e){
        exit('<p>Erreur lors de l\'insertion des données dans la table : '.$this->table
             .'<br/>'.$e->getMessage().'</p>');
      }
    }

    public function getByLogin($login) {
      try{
        $sql = 'SELECT * FROM '.$this->table.' WHERE login = :login';
        $req = $this->query($sql,array(":login"=>$login));
        $res = $req->fetch(PDO::FETCH_ASSOC);
        return $res;
      }
      catch(PDOException $e){
        exit('<p>Erreur lors de la selection de l\'objet dans la table : '.$this->table
             .'<br/>'.$e->getMessage().'</p>');
      }
    }

    public function updateStudentPassword($studentID, $newPassword) {
      try {
        $sql = 'UPDATE '.$this->table.' SET password = :password WHERE '.$this->pk_key.' = :studentID';
        $req = $this->query($sql, array(':password' => $newPassword,
                                        ':studentID' => $studentID));
      }
      catch (PDOException $e) {
        exit('<p>Erreur lors de la mise à jour dans la table : '.$this->table
             .'<br/>'.$e->getMessage().'</p>');
      }
    }

    public function updateStudentProm($studentID, $newProm) {
      try {
        $sql = 'UPDATE '.$this->table.' SET prom = :prom WHERE '.$this->pk_key.' = :studentID';
        $req = $this->query($sql, array(':prom' => $newProm,
                                        ':studentID' => $studentID));
      }
      catch (PDOException $e) {
        exit('<p>Erreur lors de la mise à jour dans la table : '.$this->table
             .'<br/>'.$e->getMessage().'</p>');
      }
    }
  }
?>
