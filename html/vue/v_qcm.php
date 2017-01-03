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
	<body>
	
	  <!-- multistep form -->
<form id="msform" align="center" >
  <!-- progressbar -->
  <ul id="progressbar" style="display:inline-table;" >
    <li id="progress1">Groupe 1</li>
    <li id="progress2">Groupe 2</li>
    <li id="progress3">Groupe 3</li>
    <li id="progress4">Groupe 4</li>
    <li id="progress5">Groupe 5</li>
    <li id="progress6">Groupe 6</li>
    <li id="progress7">Groupe 7</li>
    <li id="progress8">Groupe 8</li>
    <li id="progress9">Groupe 9</li>
    <li id="progress10">Groupe 10</li>
    <li id="progress11">Groupe 11</li>
    <li id="progress12">Groupe 12</li>
  </ul>
  <!-- fieldsets -->


<div align="center" >
    <table id="groupe1" align="center" >
      <tr class="green">
        <th><label></label></th>
        <th><label>Question</label></th>
        <th><label>1</label></th>
        <th><label>2</label></th>
        <th><label>3</label></th>
      </tr>
       <tr>
         <td><label>A</label></td>
         <td><label name = "label" ></label></td>
         <td><input type="checkbox" class="checkbox1" name="checkbox" id="a"/></td>
         <td><input type="checkbox" class="checkbox2" name="checkbox" id="a"/></td>
         <td><input type="checkbox" class="checkbox3" name="checkbox" id="a"/></td>
       </tr>
       <tr>
         <td><label>B</label></td>
         <td><label name = "label" ></label></td>
         <td><input type="checkbox" class="checkbox1" name="checkbox" id="b"/></td>
         <td><input type="checkbox" class="checkbox2" name="checkbox" id="b"/></td>
         <td><input type="checkbox" class="checkbox3" name="checkbox" id="b"/></td>
       </tr>
       <tr>
         <td><label>C</label></td>
         <td><label name = "label" ></label></td>
         <td><input type="checkbox" class="checkbox1" name="checkbox" id="c"/></td>
         <td><input type="checkbox" class="checkbox2" name="checkbox" id="c"/></td>
         <td><input type="checkbox" class="checkbox3" name="checkbox" id="c"/></td>
       </tr>
       <tr>
         <td><label>D</label></td>
         <td><label name = "label" ></label></td>
         <td><input type="checkbox" class="checkbox1" name="checkbox" id="d"/></td>
         <td><input type="checkbox" class="checkbox2" name="checkbox" id="d"/></td>
         <td><input type="checkbox" class="checkbox3" name="checkbox" id="d"/></td>
       </tr>
       <tr>
         <td><label>E</label></td>
         <td><label name = "label" ></label></td>
         <td><input type="checkbox" class="checkbox1" name="checkbox" id="e"/></td>
         <td><input type="checkbox" class="checkbox2" name="checkbox" id="e"/></td>
         <td><input type="checkbox" class="checkbox3" name="checkbox" id="e"/></td>
       </tr>
       <tr>
         <td><label>F</label></td>
         <td><label name = "label" ></label></td>
         <td><input type="checkbox" class="checkbox1" name="checkbox" id="f"/></td>
         <td><input type="checkbox" class="checkbox2" name="checkbox" id="f"/></td>
         <td><input type="checkbox" class="checkbox3" name="checkbox" id="f"/></td>
       </tr>
    </table>

    <input type="button" hidden="hidden" onclick='prevGroupe()' name="prev" class="next action-button" value="Precedent" />
    <input type="button" onclick='nextGroupe()' name="next" class="next action-button" value="Suivant" />


</div>
</form>
  <!-- <script src="index.js"></script> -->

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

    <script src='includes/swipe.js'></script>
    <script src='includes/drawStat.js'></script>

    <div style='text-align:center;padding-top:20px;'>

    <button onclick='change()' class="button" style="vertical-align:middle"><span>Change </span></button>
  </div>

  <script src="includes/question.js"></script>
  <script src="includes/table.js"></script>
  <script src="includes/bar.js"></script>
  <script src="includes/hexagone.js"></script>
  <script src="includes/qcm.js"></script>
	</body>
</html>