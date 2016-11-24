<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>SandBox World</title>
	</head>
	<body>

<a href="../">Retour</a></br>
<?php
echo'Voila du texte affiché en php!</br>';
$i=0;
while($i!=10){
	echo''.$i.'</br>';
	$i=$i+1;
}

echo'Voila du html affiché en php!</br>';
$i=0;
while($i!=10){
	echo'<div id="left-bar" style="display:inline-block; color:red;">Je suis le liens '.$i.'</div>';
	$i=$i+1;
}

?>


	</body>
</html>