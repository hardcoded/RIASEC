<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>Admin - Riasec</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="includes/jquery-3.1.1.min.js"></script>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.bundle.js"></script>
		<script src="includes/hexagone.js"></script>
	</head>
	<body style="background-color: #34495e;">

    <div class="navbar navbar-inverse" role="navigation" style="margin-bottom: 0px;">
      <div class="container-fluid">
          <div class="navbar-header">
						<p class="navbar-text">Bonjour <?php echo $admin['login']; ?></p>
          </div>
					<div class="navbar-header">
						<form action="index.php?section=edit" method="post" >
	  					<button type="submit" class="btn btn-link navbar-btn">Modifier questionnaire</button>
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
			else if (!empty($succes)) {
				echo $succes;
			}
		?>

    <div class="buttonHandlerProfil ">
			<?php
				echo'<span type="button" class="bouttonProfil" data-toggle="modal" data-target="#modalCreate">Creer session</span>';
			?>
	</div>
    <div class="tabPromoSession">
    	<table>
       			<?php
    			foreach($departments as $dep){
    				echo'<tr>
    					<th>'.$dep['label_department'].'</th>';

    					foreach ($tabSession as $tabS) {
    						if($tabS['label_department']==$dep['label_department']){
    							echo'<td><a href="?section=resultats&Promo='.$tabS['ID_prom'].'"><span type="button" class="bouttonTab">'.$tabS['code'].'</span></a></td>';
    						}
    					}
	  				echo'</tr>';


    			} ?>


    	</table>
    </div>

	<!-- Modal Join -->
	<div id="modalCreate" class="modal fade" role="dialog">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Creer une session</h4>
	      </div>
	      <div class="modal-body">
					<div class="modal-body">
		     	 <form action="index.php?section=admin&type=code" method="post" >
						 <div style="text-align:center; margin: 1em auto 0em auto;">
	 			   		<select class="form-control" id="section" name="section" style="width: auto; display: inline;">
	 		        		<?php
	 		              foreach ($departments as $dep) {
	 		                echo '<option value="'.$dep['ID_department'].'">'.$dep['label_department'].'</option>';
	 		              }
	 		            ?>
	 		     		</select>
	 		            <select class="form-control" name="annee" style="width: auto; display: inline;">
	 				        <option>3</option>
	 				        <option>4</option>
	 				        <option>5</option>
	 				     </select>
	 				     <select class="form-control" name="graduation" style="width: auto; display: inline;">
	 				        <?php
	 		              $year = date("Y");
	 		              for ($i = $year; $i < $year+5; $i++) {
	 		                echo '<option value="'.$i.'">'.$i.'</option>';
	 		              }
	 		            ?>
	 				     </select>
 				     </div>
			   		<input type="text" class="form-control" placeholder="Code session" name="codeSession" style="width: 45%; margin: 0em auto 0em auto; border-color: #3498db; ">
			   		<input type="submit" class="boutton" style="background-color: #27ae60; font-size: 1em; padding: 0.3em 0.3em 0.3em 0.3em; color:white;" value="Creer">
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
