<?php

require_once "DatabaseConnection.php";

/**
 * Classe abstraite permettant de factoriser certaines fonctions
 * communes à toutes les classes de modèles
 * @author JohanBrunet
 */
abstract class Model {

    /**
     * @var $database instance de la connexion à la base de données
     */
    protected $database;
    /**
     * @var $pk_key clé primaire de la table sur laquelle on exécute les requêtes
     */
    protected $pk_key;
    /**
     * @var $table nom de la table sur laquelle on exécute les requêtes
     */
    protected $table;

    /**
     * Fonction pour l'exécution de requêtes
     * @param string $sql requête SQL à exécuter
     * @param array $params tableau des paramètres de la requête, null si non spécifié
     * @return PDOStatement le résultat de la requête SQL
     */
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

    /**
     * Fonction pour récupérer tous les enregistrements de la table
     * @return array tableau associatif
     */
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

    /**
     * Fonction pour la récupération d'un enregistrement en particulier
     * @param int $id identifiant de l'enregistrement
     * @return array tableau associatif
     */
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
