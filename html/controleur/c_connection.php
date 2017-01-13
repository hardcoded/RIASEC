<?php

	require_once('AuthController.php');
	$authController = new AuthController();

	//On regarde quel est le formulaire qui a été posté si il y en a eu un
	if($_GET['type']=='login'){
	//On vérifie les champs
		error_reporting(E_ALL);

		if(!empty($_POST)){
				$retour=1;
			foreach($_POST as $cle=>$val){
				if(empty($val)){
					echo '<span class="error">Le champ ',$cle,' est obligatoire.</span>';
					$retour=0;
				}
			}
			if($retour==0){
				echo '<a href="javascript:history.go(-1);"><span class="error" style=""></br>Cliquez ici pour corriger le formulaire</span></a>';
			}
			else{
				$login = htmlspecialchars($_POST['username']);
				$password = hash("sha256", $_POST['password']);
        $authController->studentConnexion($login,$password);
				echo "<script type='text/javascript'>document.location.replace('vue/v_compte.php');</script>";
			}
		}
	}
	else if($_GET['type']=='loginadmin'){
	//On vérifie les champs
		error_reporting(E_ALL);

		if(!empty($_POST)){
				$retour=1;
			foreach($_POST as $cle=>$val){
				if(empty($val)){
					echo '<span class="error">Le champ ',$cle,' est obligatoire.</span>';
					$retour=0;
				}
			}
			if($retour==0){
				echo '<a href="javascript:history.go(-1);"><span class="error" style=""></br>Cliquez ici pour corriger le formulaire</span></a>';
			}
			else{
				$login = htmlspecialchars($_POST['username']);
				$password = hash("sha256", $_POST['password']);
				$authController->adminConnexion($login,$pasword);
				echo 'Successfuly logged';
			}
		}


	}
	else if($_GET['type']=='register'){
	//On vérifie les champs
		error_reporting(E_ALL);

		if(!empty($_POST)){
				$retour=1;
			foreach($_POST as $cle=>$val){
				if(empty($val)){
					echo '<span class="error">Le champ ',$cle,' est obligatoire.</span>';
					$retour=0;
				}
			}
			if($retour==0){
				echo '<a href="javascript:history.go(-1);"><span class="error" style=""></br>Cliquez ici pour corriger le formulaire</span></a>';
			}
			else{
				$login = htmlspecialchars($_POST['username']);
				$password = sha1($_POST['password']);
				$first_name = htmlspecialchars($_POST['first_name']);
				$last_name = htmlspecialchars($_POST['last_name']);

				$student = array();
				$student['login'] = $login;
				$student['password'] = $password;
				$student['first-name']= $first_name;
				$student['last-name'] = $last_name;
			}
		}
	}

	include_once('vue/v_connection.php');

?>
