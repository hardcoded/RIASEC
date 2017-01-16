<?php

  require_once "Model.php";

  /**
   * Classe permettant l'interaction avec la table "admin"
   * Hérite de la classe Model
   * @author JohanBrunet
   */
  class AdminModel extends Model {

    /**
     * @var $pk_key clé primaire de la table
     */
    protected $pk_key = 'ID_admin';
    /**
     * @var $table table de la base de données utilisée par la classe
     */
    protected $table = 'admin';

    /**
     * Création d'un nouveua compte administrateur
     * @param array $admin tableau contenant les valeurs à insérer dans la table
     * @return int l'identifiant du nouvel enregistrement
     */
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

    /**
     * Sélection d'un administrateur par son login
     * @param string $login le login de l'administrateur
     * @return array tableau associatif contenant les informations du compte
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
     * Modification du mot de passe du compte spécifié
     * @param int $adminID identifiant du compte à modifier
     * @param string $newPassword nouveau mot de passe du compte
     */
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
