<?php

/**
 * Classe de connexion à une base de données
 * S'inspire du pattern singleton pour n'ouvrir qu'une seule connexion
 * @author JohanBrunet
 */
class DatabaseConnection {

   // // Paramètres pour l'accès à la base
   // static private $host = "db648137671.db.1and1.com";
   // static private $database   = "db648137671";
   // static private $user = "dbo648137671";
   // static private $password = "piscineRiasec";

   /**
    * Paramètres pour l'accès à la base de données
    * @var $host hôte de la base de données
    */
   static private $host = "localhost";
   /**
    * @var $database nom de la base de données
    */
   static private $database   = "riasec";
   /**
    * @var $user utilisateur pour la connexion à la base de données
    */
   static private $user = "riasec";
   /**
    * @var $password mot de passe pour la connexion à la base de données
    */
   static private $password = "riasec";

   /**
    * Singleton
    * @var $pdo variable contenant l'instance de la connexion
    */
   static private $pdo = null;

   /**
    * Obenir le singleton
    * @return PDO l'instance de la connexion
    */
   static function getInstance() {
      if (self::$pdo == null) {
         $dsn = sprintf("mysql:host=%s;dbname=%s", self::$host, self::$database);
         try {
            self::$pdo = new PDO($dsn, self::$user, self::$password,
                                 array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
         } catch (PDOException $e) {
            exit('<p>Erreur de connexion au serveur '.self::$host.' ('.self::$user
                 .')<br/>'.$e->getMessage().'</p>');
         }
      }
      return self::$pdo;
   }
}

?>
