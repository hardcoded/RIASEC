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
			$resultat_stock = [
			array('type' => 'R','percentage' =>$resultat[0]),
			array('type' => 'I','percentage' => $resultat[1]),
			array('type' => 'A','percentage' => $resultat[2]),
			array('type' => 'S','percentage' => $resultat[3]),
			array('type' => 'E','percentage' => $resultat[4]),
			array('type' => 'C','percentage' => $resultat[5])];
			$resultModel->storeResult($IDstudent,$resultat_stock);
		}
	}
	//else if ($status == 'admin') à faire ..

	include_once('vue/v_resultats.php');
