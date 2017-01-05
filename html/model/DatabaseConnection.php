<?php

// Classe de connexion à une base de données
// S'inspire du pattern singleton pour n'ouvrir qu'une seule connexion
// Utilisation :
//    $bd = MaBD::getInstance(); // $bd est un objet PDO
class DatabaseConnection {

   // Paramètres pour l'accès à la base
   static private $host = "db648137671.db.1and1.com";
   static private $database   = "db648137671";
   static private $user = "dbo648137671";
   static private $password = "piscineRiasec";

   static private $pdo = null; // Le singleton

   // Obenir le singleton
   static function getInstance() {
      if (self::$pdo == null) {
         $dsn = sprintf("mysql:host=%s;dbname=%s", self::$host, self::$database);
         try {
            self::$pdo = new PDO($dsn, self::$user, self::$password,
                                 array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
         } catch (PDOException $e) {
            exit('<p class="erreur">Erreur de connexion au serveur '.self::$host.' ('.self::$user
                 .')<br/>'.$e->getMessage().'</p>');
         }
      }
      return self::$pdo;
   }
}

?>
