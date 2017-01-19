<?php

  require_once "Model.php";

  /**
   * Classe permettant l'interaction avec la table "student"
   * Hérite de la table "Model"
   * @author JohanBrunet
   */
  class StudentModel extends Model {

    /**
     * @var $pk_key clé primaire de la table
     */
    protected $pk_key = 'ID_student';
    /**
     * @var $table table de la base de données utilisée par la classe
     */
    protected $table = 'student';

    /**
     * Création d'un nouvel étudiant
     * @param array $student informations concernant l'étudiant
     * @return int identifiant de l'étudiant créé
     */
    public function createStudent($student) {
      try {
        $sql = 'INSERT INTO '.$this->table.' (login, password, first_name, last_name, prom) VALUES (:login, :password, :first_name, :last_name, :prom)';
        $req = $this->query($sql, array(':login' => $student['login'],
                                        ':password' => $student['password'],
                                        ':first_name' => $student['firstName'],
                                        ':last_name' => $student['lastName'],
                                        ':prom' => $student['promID']));
        return $this->database->lastInsertId();
      }
      catch(PDOException $e){
        exit('<p>Erreur lors de l\'insertion des données dans la table : '.$this->table
             .'<br/>'.$e->getMessage().'</p>');
      }
    }

    /**
     * Récupérer un étudiant par son login
     * @param string $login login de l'étudiant à récupérer
     * @return array tableau tableau associatif contenant les informations de l'étudiant
     */
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

    /**
     * Modifier le mot de passe de l'étudiant
     * @param int $studentID identifiant de l'étudiant à modifier
     * @param string $newPassword nouveau mot de passe de l'étudiant
     */
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

    /**
     * Modifier la promotion d'un étudiant
     * @param int $studentID identifiant de l'étudiant à modifier
     * @param int $newProm identifiant de la nouvelle promotion de l'étudiant
     */
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

    /**
     * Récupérer tous les étudiants d'une même promotion
     * @param int $prom identifiant de la promotion
     * @return array tableau associatif contenant les étudiants de la promotion
     */
    public function getByProm($prom) {
      try{
        $sql = 'SELECT * FROM '.$this->table.' WHERE prom = :prom';
        $req = $this->query($sql,array(":prom"=>$prom));
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
