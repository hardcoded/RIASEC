<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>Riasec</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="includes/jquery-3.1.1.min.js"></script>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>		
	</head>
	<body style="background-color: #34495e;">
	
	<div class="titreProfil">
		Mon profil
	</div>

	<div class="buttonHandlerProfil ">
		<?php 
		if(!$estAdmin){
			echo'<span type="button" class="bouttonProfil" data-toggle="modal" data-target="#modalJoin">Rejoindre un test</span>';
		}
		else{
			echo'<span type="button" class="bouttonProfil" data-toggle="modal" data-target="#modalJoin">Creer session</span>';
		}
		?>
	</div>
	<div class="histoHandlerProfil ">
		<span class="histoTitre">
		Vos résultats de tests
		</span>
		<span class="histoId" style="text-decoration: underline;">ID session</span><span class="histoLink" style="text-decoration: underline;">Lien Resultat</span>
		<span class="histoId">128</span><a class="histoLink">Voir</a>
		<span class="histoId">4080</span><a class="histoLink">Voir</a>
	</div>

<!-- Modal Join -->
<div id="modalJoin" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Rejoindre une session</h4>
      </div>
      <div class="modal-body">
      	<form action="index.php" method="post" >
	   		<input type="text" class="form-control" placeholder="ID Session" name="id_session" style="width: 45%; margin: 0em auto 0em auto; border-color: #3498db; ">
	   		<input type="password" class="form-control" placeholder="Mot de passe" name="password" style="width: 45%; margin: 1em auto 0em auto; border-color: #3498db; ">
	   		<input type="button" class="boutton" style="background-color: #27ae60; font-size: 1em; padding: 0.3em 0.3em 0.3em 0.3em;" Value="Rejoindre">
      	</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
      </div>
    </div>

  </div>
</div>

	</body>
</html>