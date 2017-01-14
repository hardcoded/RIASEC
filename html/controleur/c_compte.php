<?php

  require_once('AuthController.php');

  $authController = new AuthController();

	//Ici need que estAdmin = true si l'utilisateur co est admin, false sinon
	if(isset($_COOKIE['token'])) {
    $tok = $_COOKIE['token'];
    $token = $authController->decodeToken($tok);
    $data = $token['data'];
  	if ($data['role'] == 'etudiant') {
      header('Location: ./?section=student');
    }
    else {
      header('Location: ./?section=admin');
    }
  }
  else {
    header('Location: ./');
  }
