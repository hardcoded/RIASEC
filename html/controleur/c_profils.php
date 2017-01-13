<?php

	include_once('modele/m_profils.php');


	if($_GET["profil"] == "realiste"){
		include_once('vue/v_realiste.php');
	}
	else if($_GET["profil"] == "investigatif"){
		include_once('vue/v_investigatif.php');
	}
	else if($_GET["profil"] == "artistique"){
		include_once('vue/v_artistique.php');
	}
	else if($_GET["profil"] == "social"){
		include_once('vue/v_social.php');
	}
	else if($_GET["profil"] == "entrepreneur"){
		include_once('vue/v_entrepreneur.php');
	}
	else if($_GET["profil"] == "conventionnel"){
		include_once('vue/v_conventionnel.php');
	}