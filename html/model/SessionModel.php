<?php

  require_once "Model.php";
  require_once('PromModel.php');
  require_once('StudentModel.php');

  class SessionModel extends Model {

    protected $pk_key = 'ID_session';
    protected $table = 'session';

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

    public function getByCode($codeSession) {
      try {
        $sql = "SELECT * FROM ".$this->table." WHERE code = :code)";
        $req = $this->query($sql, array(':code' => $codeSession));
        $res = $req->fetch(PDO::FETCH_ASSOC);
        return $res;
      }
      catch(PDOException $e){
        exit('<p>Erreur lors de la recherche des données dans la table : '.$this->table
             .'<br/>'.$e->getMessage().'</p>');
      }
    }

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

  }
?>
