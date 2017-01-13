<?php

  require_once "Model.php";

  class AdminModel extends Model {

    protected $pk_key = 'ID_admin';
    protected $table = 'admin';

    public function createAdmin($admin) {
      try {
        $sql = 'INSERT INTO '.$this->table.' (login, password) VALUES (:login, :password)';
        $req = $this->query($sql, array(':login' => $admin['login'],
                                        ':password' => $admin['password']));
        return $this->database->lastInsertId();
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

    public function updateAdminPassword($adminID, $newPassword) {
      try {
        $sql = 'UPDATE '.$this->table.' SET password = :password WHERE '.$this->pk_key.' = :studentID';
        $req = $this->query($sql, array(':password' => $newPassword,
                                        ':studentID' => $adminID));
      }
      catch (PDOException $e) {
        exit('<p>Erreur lors de la mise à jour dans la table : '.$this->table
             .'<br/>'.$e->getMessage().'</p>');
      }
    }

  }
?>
