<?php

	require_once('model/StudentModel.php');
  require_once('AuthController.php');

  $studentModel = new StudentModel();
  $authController = new AuthController();

	//Ici need que estAdmin = true si l'utilisateur co est admin, false sinon
	if(isset($_COOKIE['token'])) {
    $tok = $_COOKIE['token'];
    $token = $authController->decodeToken($tok);
    $data = $token['data'];
  	require_once('vue/v_compte.php');
  }
  else {
    header('Location: ./?section=index');
  }
