<?php

	include_once('modele/m_resultats.php');
	$resultat;
	if(!isset($_GET['r'])){
		//Dans la bd
	}
	else if(isset($_GET['r']) && isset($_GET['i']) && isset($_GET['a']) &&isset($_GET['s']) && isset($_GET['e']) && isset($_GET['c'])){
		$resultat = [intval($_GET['r']),intval($_GET['i']),intval($_GET['a']),intval($_GET['s']),intval($_GET['e']),intval($_GET['c'])];
	}
	include_once('vue/v_resultats.php');
