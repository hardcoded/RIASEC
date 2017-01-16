<?php
 	require_once('c_auth.php');
	include_once('model/ResultModel.php');
	require_once('model/StudentModel.php');

	$resultat = array(6);
	$authController = new AuthController();
	$resultModel = new ResultModel();
	$studentModel = new StudentModel();

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
	else if ($status == 'admin'){
		$prom = intval($_GET['Promo']);// il faut faire un $_GET et récupérer ce qui est envoyé à partir de la page admin
		$resultatTotal = array(6);
		$cpt = 0;
		$section = $studentModel->getByProm($prom);

		for ($i=0; $i < count($section); $i++) { 
			$score = $resultModel->getByStudent($section[$i]["ID_student"]);

			for($j = 0 ; $j < count($score); $j++) {
					$resultatTotal[$j] += intval($score[$j]["percentage"]);
			}
			if(!(count($score) == 0)){
				$cpt+=1;
			}
		}

		for($i = 0 ; $i < 6; $i++) {
				$resultatTotal[$i] = round($resultatTotal[$i]/$cpt, 2, PHP_ROUND_HALF_ODD);
		}
		$resultat = $resultatTotal;
		include_once('vue/v_resultats.php');
	}
