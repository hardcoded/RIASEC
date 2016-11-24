<?php
global $BDD;
	$BDD = mysqli_connect('localhost','blogAdmin', '1ygD2xOuN5av','blog');
	if (mysqli_connect_errno())
	{
		printf("Echec de la connexion : %s\n", mysqli_connect_errno());
		exit();
	}
	else
	{
		//printf("Réussite connection BDD \n");
	}