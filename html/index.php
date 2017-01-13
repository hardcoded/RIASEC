<?php

	if(!isset($_GET['section']) || $_GET['section']=='index'){
		require_once('controleur/c_connection.php');
    // require_once('vue/v_connection.php');
	}
	else if($_GET['section']=='qcm'){
		include_once('controleur/c_qcm.php');
	}
	else if($_GET['section']=='compte'){
		include_once('controleur/c_compte.php');
	}
