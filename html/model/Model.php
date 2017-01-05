<?php

require_once "DatabaseConnection.php";

abstract class Model {

    protected $database;
    protected $pk_key;
    protected $table;

    protected function query($sql, $params = null) {
      $database = DatabaseConnection::getInstance();
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
        echo($e->getMessage());
        die("<br> Erreur lors de la recherche de tous les objets de la table" . $this->table);
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
        echo($e->getMessage());
        die("<br> Erreur lors de la selection de l'objet dans la table " . $this->table);
      }
    }
}

?>
