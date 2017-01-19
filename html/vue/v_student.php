<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>Mon Compte - Riasec</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="includes/jquery-3.1.1.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.bundle.js"></script>
		<script src="includes/hexagone.js"></script>
		<script src="includes/bar.js"></script>
		<script src="includes/affichageprofil.js"></script>
	</head>
	<body style="background-color: #34495e;">

	<!-- Bar suppérieur pour la déconnection -->
    <div class="navbar navbar-inverse" style="margin-bottom: 0px" role="navigation">
      <div class="container-fluid">
          <div class="navbar-header">
              <p class="navbar-text">Bonjour <?php echo $student['first_name'].' '.$student['last_name']; ?></p></li>
          </div>
          <div class="navbar-header">
						<form action="./?section=profils&profil=realiste" method="post" >
							<button type="submit" class="btn btn-link navbar-btn">Profils</button>
						</form>
          </div>
          <div class="navbar-right">
						<form action="index.php?section=index&type=disconnect" method="post" >
							<button type="submit" class="btn btn-link navbar-btn">Déconnexion</button>
						</form>
          </div>
      </div>
    </div>

		<?php
			if (!empty($error)) {
				echo $error;
			}
		?>
		<!-- Bar latéral de bouttons -->
		<div class="buttonHandlerProfil">
			<?php
				echo'<span type="button" class="bouttonProfil" data-toggle="modal" data-target="#modalJoin">Rejoindre session</span>';
			?>
			<div id='message' style="color: white"></div>
		</div>

		<!-- Corp de la page -->
		<div class="histoHandlerProfil" style="margin-top: 20px">
			<div id='stat' style='max-width:500px;margin:0 auto' class='swipe'>
			    <div class='swipe-wrap'>


			      <div>
			              <canvas id="bar" width="500" height="500">
			                  Message pour les navigateurs ne supportant pas encore canvas.
			              </canvas>
			      </div>

			      <div>
				        <canvas id="hexagone" width="500" height="500">
				            Message pour les navigateurs ne supportant pas encore canvas.
				        </canvas>
			      </div>

			    </div>

			    <script>var ar = <?php echo json_encode($resArray) ?> </script>
			    <!-- Script d'affichage de l'hexagone -->
				<script src='includes/swipe.js'></script>
				<script>drawBar(ar); drawHexagone(ar);</script>

				<script src='includes/drawStat.js'></script>

			<div style='text-align:center;'>

		 <button onclick='change()' class="button" style="vertical-align:middle"><span>Change </span></button>
		</div>
		<!-- Script pour l'affichage du lien vers le profils prépondérent -->
		<script>
			var profil = Profil(ar);
			document.getElementById('message').innerHTML = 'D\'après vos réponses au questionnaire RIASEC, vous avez un profil de type <a href="?section=profils&profil=' + profil + '" style="color:white; font-size:1,2em;">' + profil + '</a>';
		</script>


	<!-- Modal Join -->
	<div id="modalJoin" class="modal fade" role="dialog">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Rejoindre une session</h4>
	      </div>
	      <div class="modal-body">
					<div class="modal-body">
		     	 <form action="index.php?section=student&type=code" method="post" >
			   		<input type="text" class="form-control" placeholder="Code session" name="codeSession" style="width: 45%; margin: 0em auto 0em auto; border-color: #3498db; ">
			   		<input type="submit" class="boutton" style="background-color: #27ae60; font-size: 1em; padding: 0.3em 0.3em 0.3em 0.3em; color:white;" value="Rejoindre">
			   	 </form>
		      </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
	      </div>
	    </div>

	  </div>
	</div>

	</body>
</html>
