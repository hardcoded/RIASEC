<?php

  require_once "Model.php";

  /**
   * Classe permettant l'interaction avec la table "session"
   * Hérite de la classe Model
   * @author JohanBrunet
   */
  class SessionModel extends Model {

    /**
     * @var $pk_key clé primaire de la table
     */
    protected $pk_key = 'ID_session';
    /**
     * @var $table table de la base de données utilisée par la classe
     */
    protected $table = 'session';

    /**
     * Création d'une session pour passer le test
     * @param array $session tableau contenant les informations de la session à créer
     * @return int identifiant de la session créée
     */
    public function createSession($session) {
      try {
        $sql = "INSERT INTO ".$this->table." (code, date_session, prom) VALUES (:code, :date, :prom)";
        $req = $this->query($sql, array(':code' => $session['code'],
                                        ':date' => $session['date'],
                                        ':prom' => $session['prom']));
        return $this->database->lastInsertId();
      }
      catch(PDOException $e){
        exit('<p>Erreur lors de l\'insertion des données dans la table : '.$this->table
             .'<br/>'.$e->getMessage().'</p>');
      }
    }

    /**
     * Obtenir une session par le code associé
     * @param string $codeSession code de la session à récupérer
     */
    public function getByCode($codeSession) {
      try {
        $sql = "SELECT * FROM ".$this->table." WHERE code = :code";
        $req = $this->query($sql, array(':code' => $codeSession));
        $res = $req->fetch(PDO::FETCH_ASSOC);
        return $res;
      }
      catch(PDOException $e){
        exit('<p>Erreur lors de la recherche des données dans la table : '.$this->table
             .'<br/>'.$e->getMessage().'</p>');
      }
    }

    /**
     * Vérifier si une session est accessible à l'étudiant (même promo)
     * @param string $codeSession code de la session à vérifier
     * @param array $student tableau contenant les informations de l'étudiant
     * @return bool true si la session est accesible par l'étudiant, false sinon
     */
    public function checkSession($codeSession, $student) {
      if ($session = $this->getByCode($codeSession)) {
        if ($session['prom'] == $student['prom']) {
          return true;
        }
        else {
          return false;
        }
      }
      return false;
    }

    /**
     * Récupérer les départements associés aux sessions
     * @return array tableau associatif contenant les informations des sessions
     */
    public function getSessionDepartment() {
      try {
        $sql = "SELECT label_department,code,ID_prom FROM department d,prom p,session s WHERE d.ID_department = p.department AND p.ID_prom = s.prom";
        $req = $this->query($sql);
        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
      }
      catch(PDOException $e){
        exit('<p>Erreur lors de la recherche des données dans la table : '.$this->table
             .'<br/>'.$e->getMessage().'</p>');
      }
    }
  }
?>
