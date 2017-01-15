<?php
	include_once('includes/table.js');
	include_once('modele/ResultModel.php');
	$resultat; 
	$IDstudent = $authController-->decodeToken($_COOKIE["token"]["data"]["userID"]);
	if(!isset($_GET['r'])){
		//if (faire un cas où base de donnée vide)		
		$resultat =getByStudent($IDstudent);}
	}
	else if(isset($_GET['r']) && isset($_GET['i']) && isset($_GET['a']) &&isset($_GET['s']) && isset($_GET['e']) && isset($_GET['c'])){
		$resultat = [intval($_GET['r']),intval($_GET['i']),intval($_GET['a']),intval($_GET['s']),intval($_GET['e']),intval($_GET['c'])];
		$resultat_stock =[ 
		array('type' => 'R','percentage' =>$resultat[0]);
		array('type' => 'I','percentage' => $resultat[1]);
		array('type' => 'A','percentage' => $resultat[2]);
		array('type' => 'S','percentage' => $resultat[3]);
		array('type' => 'E','percentage' => $resultat[4]);
		array('type' => 'C','percentage' => $resultat[5]);
		storeResult($IDstudent,$resultat_stock)

	}

	include_once('vue/v_resultats.php');
