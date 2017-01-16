<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>Resultat - Riasec</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="includes/jquery-3.1.1.min.js"></script>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.bundle.js"></script>
	</head>
	<body style="background-color: #34495e;">

	<div class="titreProfil">
		Mes résultats
	</div>
  	<script src="includes/bar.js"></script>
  	<script src="includes/hexagone.js"></script>

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

    <script> var ar = <?php echo json_encode($resultat) ?></script>

    <script src='includes/swipe.js'></script>
    <script> drawBar(ar); drawHexagone(ar);</script>


    <script src='includes/drawStat.js'></script>

    <div style='text-align:center;padding-top:20px;'>

    <button onclick='change()' class="button" style="vertical-align:middle"><span>Change </span></button>
  </div>

	</body>
</html>
