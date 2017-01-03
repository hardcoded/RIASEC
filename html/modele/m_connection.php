<?php
// Hachage du mot de passe
if(isset($_POST["username"])&&isset($_POST["password"])){
	echo ''.$_POST["username"];
	$pass_hache = sha1($_POST["password"]);




}