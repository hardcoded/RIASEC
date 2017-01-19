<?php

	require_once('c_auth.php');
	require_once('model/PromModel.php');
	require_once('model/DepartmentModel.php');
	require_once('model/StudentModel.php');
	$authController = new AuthController();
	$promModel = new PromModel();
	$depModel = new DepartmentModel();
	$studentModel = new StudentModel();

	$departments = $depModel->getAll();

	//On regarde quel est le formulaire qui a été posté si il y en a eu un
	if($_GET['type']=='login'){
	//On vérifie les champs
		if(!empty($_POST)){
				$retour=1;
				$message = "";
			foreach($_POST as $cle=>$val){
				if(empty($val)){
					$message .= '<div class="alert alert-danger">
    										Le champ <strong>'.$cle.'</strong> est obligatoire.
  										</div>';
					$retour=-1;
				}
			}
			if($retour==-1){
				echo $message;
			}
			else{
				$login = htmlspecialchars($_POST['username']);
				$password = hash("sha256", $_POST['password']);
        $authController->studentConnexion($login,$password);
				$err = AuthController::$error;
				if (empty($err)) {
					header('Location: ./?section=compte');
				}
				else {
					echo '<div class="alert alert-danger">'.$err.'</div>';
				}
			}
		}
	}
	else if($_GET['type']=='loginadmin'){
	//On vérifie les champs
    if(!empty($_POST)){
				$retour=1;
				$message = "";
			foreach($_POST as $cle=>$val){
				if(empty($val)){
					$message .= '<div class="alert alert-danger">
    										Le champ <strong>'.$cle.'</strong> est obligatoire.
  										</div>';
					$retour=-1;
				}
			}
			if($retour==-1){
				echo $message;
			}
			else{
				$login = htmlspecialchars($_POST['username']);
				$password = hash("sha256", $_POST['password']);
        $authController->adminConnexion($login,$password);
				$err = AuthController::$error;
				if (empty($err)) {
					header('Location: ./?section=compte');
				}
				else {
					echo '<div class="alert alert-danger">'.$err.'</div>';
				}
			}
	  }
  }
	else if($_GET['type']=='register'){
	//On vérifie les champs
		error_reporting(E_ALL);

		if(!empty($_POST)){
				$retour=1;
				$message = "";
			foreach($_POST as $cle=>$val){
				if(empty($val)){
					$message .= '<div class="alert alert-danger">
    										Le champ <strong>'.$cle.'</strong> est obligatoire.
  										</div>';
					$retour=-1;
				}
			}
			if($retour==-1){
				echo $message;
			}
			else{
				$student = array();
				$student['login'] = htmlspecialchars($_POST['username']);
				$student['password'] = hash("sha256", $_POST['password']);
				$student['firstName']= htmlspecialchars($_POST['first_name']);
				$student['lastName'] = htmlspecialchars($_POST['last_name']);

				$promo = array('department' => $_POST['section'],
											 'year' => $_POST['annee'],
										 	 'graduation' => $_POST['graduation']);

				$checkProm = $promModel->checkProm($promo);
				if ($checkProm == -1) {
					$newProm = $promModel->createProm($promo);
					$student['promID'] = $newProm;
				}
				else {
					$student['promID'] = $checkProm;
				}
        $studentModel->createStudent($student);
        $authController->studentConnexion($student['login'], $student['password']);
        $err = AuthController::$error;
        if (empty($err)) {
          header('Location: ./?section=compte');
        }
        else {
          echo '<div class="alert alert-danger">'.$err.'</div>';
        }
			}
		}
	}
  else if ($_GET['type'] == 'disconnect') {
    $authController->disconnect();
    header('Location: ./?section=index');
  }

	if (!isset($_COOKIE['token'])) {
    include_once('vue/v_connection.php');
  }
  else {
    require_once('controleur/c_compte.php');
  }

?>
