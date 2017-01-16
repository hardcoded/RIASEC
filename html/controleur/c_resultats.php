<?php
 	require_once('c_auth.php');
	include_once('model/ResultModel.php');

	$resultat = array(6);

	$authController = new AuthController();
	$resultModel = new ResultModel();

	$IDstudent = $authController->decodeToken($_COOKIE['token'])["data"]["userID"];

	$status = $authController->decodeToken($_COOKIE['token'])["data"]["role"];

	if ($status == 'etudiant'){// s'il s'agit d'un étudiant

		if(!isset($_GET['r'])){//s'il n'y a pas de résultat, il faut le trouver dans la BD
			//if (faire un cas où base de donnée vide)
			$score = $resultModel->getByStudent($IDstudent);

			for($i = 0 ; $i < count($score); $i++) {
					$resultat[$i] = intval($score[$i]["percentage"]);
			}

		}
		else if(isset($_GET['r']) && isset($_GET['i']) && isset($_GET['a']) &&isset($_GET['s']) && isset($_GET['e']) && isset($_GET['c'])){
			$resultat = [intval($_GET['r']),intval($_GET['i']),intval($_GET['a']),intval($_GET['s']),intval($_GET['e']),intval($_GET['c'])];
			$student = array('ID_student' => intval($IDstudent)); 
			$resultat_stock = [
			array('type' => 1,'percentage' =>$resultat[0]),
			array('type' => 2,'percentage' => $resultat[1]),
			array('type' => 3,'percentage' => $resultat[2]),
			array('type' => 4,'percentage' => $resultat[3]),
			array('type' => 5,'percentage' => $resultat[4]),
			array('type' => 6,'percentage' => $resultat[5])];
			$tmp = $resultModel->getByStudent($IDstudent);
			if(!empty($tmp)){
				$resultModel->deleteByStudent($IDstudent);
			}
			$resultModel->storeResult($student,$resultat_stock);
			header('Location: ./?section=student');
			//include_once('controleur/c_studdent.php');
		}
		else{
			include_once('vue/v_resultats.php');
		}
	}
	
	//else if ($status == 'admin') à faire ..

	
