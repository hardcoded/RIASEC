<?php

require_once "DatabaseConnection.php";

abstract class Model {

    protected $database;
    protected $pk_key;
    protected $table;

    protected function query($sql, $params = null) {
      $this->database = DatabaseConnection::getInstance();
      if ($params == null) {
        $resultat = $this->database->query($sql);    // exécution directe
      }
      else {
        $resultat = $this->database->prepare($sql);  // requête préparée
        $resultat->execute($params);
      }
      return $resultat;
    }

    public function getAll() {
      try{
        $sql = 'SELECT * FROM '.$this->table;
        $req = $this->query($sql);
        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
      }
      catch (PDOException $e)
      {
        exit('<p>Erreur lors de la sélection sur la table : '.$this->table
             .'<br/>'.$e->getMessage().'</p>');
      }
    }

    public function getById($id) {
      try{
        $sql = 'SELECT * FROM '.$this->table.' WHERE '.$this->pk_key.' = :id';
        $req = $this->query($sql,array(":id"=>$id));
        $res = $req->fetch(PDO::FETCH_ASSOC);
        return $res;
      }
      catch(PDOException $e){
        exit('<p>Erreur lors de la selection de l\'objet dans la table : '.$this->table
             .'<br/>'.$e->getMessage().'</p>');
      }
    }
}

?>
