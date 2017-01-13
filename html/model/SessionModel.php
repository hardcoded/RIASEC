<?php

  require_once "Model.php";

  class SessionModel extends Model {

    protected $pk_key = 'ID_session';
    protected $table = 'session';

    public function createSession($session) {
      try {
        $sql = "INSERT INTO ".$this->table." (code, date_session, prom) VALUES (:code, :date, :prom)";
        $req = $this->query($sql, array(':code' => $session['code'],
                                        ':date' => $session['date'],
                                        ':prom' => $session['prom']));
      }
      catch(PDOException $e){
        exit('<p>Erreur lors de l\'insertion des données dans la table : '.$this->table
             .'<br/>'.$e->getMessage().'</p>');
      }
    }

  }
?>
