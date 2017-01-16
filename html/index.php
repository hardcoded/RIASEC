<?php

	if(!isset($_GET['section']) || $_GET['section']=='index'){
		include_once('controleur/c_connection.php');
	}
	else if($_GET['section']=='qcm'){
		include_once('controleur/c_qcm.php');
	}
	else if($_GET['section']=='compte'){
		include_once('controleur/c_compte.php');
	}
  else if($_GET['section']=='student'){
		include_once('controleur/c_studdent.php');
	}
  else if($_GET['section']=='admin'){
		include_once('controleur/c_admin.php');
	}
	else if($_GET['section']=='resultats'){
		include_once('controleur/c_resultats.php');
	}
	else if($_GET['section']=='profils'){
		include_once('controleur/c_profils.php');
	}
	else if($_GET['section']=='edit'){
		include_once('controleur/c_edit.php');
	}