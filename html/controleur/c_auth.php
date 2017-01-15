<?php

  require_once("php-jwt/src/JWT.php");
  require_once('model/StudentModel.php');
  require_once('model/AdminModel.php');
  use \Firebase\JWT\JWT;

  class AuthController {

    static public $error = "";

    public function studentConnexion($login, $password) {
      $studentModel = new StudentModel();
      $error = "";
      if ($student = $studentModel->getByLogin($login)) {
        if ($password == $student['password']) {
          $data = array("userID" => $student["ID_student"],
                        "role" => "etudiant");
          $token = $this->generateToken($data);
          setcookie("token", $token, time() + (3600 * 25), "/");
        }
        else {
          self::$error = "Mot de passe incorrect";
        }
      }
      else {
        self::$error = "Etudiant inexistant";
      }
    }

    public function adminConnexion($login, $password) {
      $adminModel = new AdminModel();

      if ($admin = $adminModel->getByLogin($login)) {
        if ($password == $admin['password']) {
          $data = Array("adminID" => $admin["ID_admin"],
                        "role" => "admin");
          $token = $this->generateToken($data);
          setcookie("token", $token, time() + (3600 * 25), "/");
        }
        else {
          self::$error = "Mot de passe incorrect";
        }
      }
      else {
        self::$error = "Etudiant inexistant";
      }
    }

    function generateToken($data){
        $key = 'myS3cr3tPhr4se';
        $issuedAt   = time();
        $expire     = $issuedAt + (3600 *25);    // 24*3600 secondes = 24h
        $serverName = $_SERVER["HTTP_HOST"];     // Nom du server

        $token = Array(
            'iat'  => $issuedAt,         // Date de création du token
            'iss'  => $serverName,       // Nom du server qui à délivré le token
            'exp'  => $expire,           // Date d'expiration
            'data' => $data              // Donnée sur l'utilisateur
        );
        $token = JWT::encode($token, $key);
        return $token;
    }

    function decodeToken($token){
        $key = 'myS3cr3tPhr4se';
        $token = (array) JWT::decode($token,$key,array('HS256'));
        $token["data"] = (array) $token["data"];
        return $token;
    }

    public function disconnect() {
      if (isset($_COOKIE['token'])) {
        setcookie("token", "", time() - 3600, "/");
        unset($_COOKIE['token']);
      }
    }
  }

?>
