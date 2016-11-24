<?php 
	include_once('connexion_sql.php');
	
	if(!isset($_GET['section']) || $_GET['section']=='index'){
		include_once('controleur/c_index.php');
	}