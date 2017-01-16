<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>Identification - Riasec</title>
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

	<div style="font-size: 3em; color : white; text-align: center; display: block; width: 100%;">
		Mode Edition
	</div>
  <div style="display: block; width: 75%; margin:auto;">
  <form action="index.php?section=edit" method="post">

  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Groupe 1
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <?php     foreach ($tabProp as $tabP) {
            if($tabP['groupe']==1){
            echo'
          <textarea rows="1" cols="150" style="display:block;">'.$tabP['label_proposition'].'</textarea>
          ';
            }
        }?>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Groupe 2
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
        <?php     foreach ($tabProp as $tabP) {
            if($tabP['groupe']==2){
            echo'
          <textarea rows="1" cols="150" style="display:block;">'.$tabP['label_proposition'].'</textarea>
          ';
            }
        }?>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
         Groupe 3
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
        <?php     foreach ($tabProp as $tabP) {
            if($tabP['groupe']==3){
            echo'
          <textarea rows="1" cols="150" style="display:block;">'.$tabP['label_proposition'].'</textarea>
          ';
            }
        }?>
      </div>
    </div>
  </div>
    <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingFour">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
          Groupe 4
        </a>
      </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
      <div class="panel-body">
        <?php     foreach ($tabProp as $tabP) {
            if($tabP['groupe']==4){
            echo'
          <textarea rows="1" cols="150" style="display:block;">'.$tabP['label_proposition'].'</textarea>
          ';
            }
        }?>
      </div>
    </div>

</div>
    <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingFive">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
          Groupe 5
        </a>
      </h4>
    </div>
    <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
      <div class="panel-body">
        <?php     foreach ($tabProp as $tabP) {
            if($tabP['groupe']==5){
            echo'
          <textarea rows="1" cols="150" style="display:block;">'.$tabP['label_proposition'].'</textarea>
          ';
            }
        }?>
      </div>
    </div>

</div>
    <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingSix">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
          Groupe 6
        </a>
      </h4>
    </div>
    <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
      <div class="panel-body">
        <?php     foreach ($tabProp as $tabP) {
            if($tabP['groupe']==6){
            echo'
          <textarea rows="1" cols="150" style="display:block;">'.$tabP['label_proposition'].'</textarea>
          ';
            }
        }?>
      </div>
    </div>

</div>
    <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingSeven">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
          Groupe 7
        </a>
      </h4>
    </div>
    <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
      <div class="panel-body">
        <?php     foreach ($tabProp as $tabP) {
            if($tabP['groupe']==7){
            echo'
          <textarea rows="1" cols="150" style="display:block;">'.$tabP['label_proposition'].'</textarea>
          ';
            }
        }?>
      </div>
    </div>

</div>
    <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingEight">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
          Groupe 8
        </a>
      </h4>
    </div>
    <div id="collapseEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEight">
      <div class="panel-body">
        <?php     foreach ($tabProp as $tabP) {
            if($tabP['groupe']==8){
            echo'
          <textarea rows="1" cols="150" style="display:block;">'.$tabP['label_proposition'].'</textarea>
          ';
            }
        }?>
      </div>
    </div>

</div>
    <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingNine">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
          Groupe 9
        </a>
      </h4>
    </div>
    <div id="collapseNine" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingNine">
      <div class="panel-body">
        <?php     foreach ($tabProp as $tabP) {
            if($tabP['groupe']==9){
            echo'
          <textarea rows="1" cols="150" style="display:block;">'.$tabP['label_proposition'].'</textarea>
          ';
            }
        }?>
      </div>
    </div>

</div>
    <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTen">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
          Groupe 10
        </a>
      </h4>
    </div>
    <div id="collapseTen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTen">
      <div class="panel-body">
        <?php     foreach ($tabProp as $tabP) {
            if($tabP['groupe']==10){
            echo'
          <textarea rows="1" cols="150" style="display:block;">'.$tabP['label_proposition'].'</textarea>
          ';
            }
        }?>
      </div>
    </div>

</div>
    <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingEleven">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
          Groupe 11
        </a>
      </h4>
    </div>
    <div id="collapseEleven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEleven">
      <div class="panel-body">
        <?php     foreach ($tabProp as $tabP) {
            if($tabP['groupe']==11){
            echo'
          <textarea rows="1" cols="150" style="display:block;">'.$tabP['label_proposition'].'</textarea>
          ';
            }
        }?>
      </div>
    </div>

</div>
    <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwelve">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
          Groupe 12
        </a>
      </h4>
    </div>
    <div id="collapseTwelve" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwelve">
      <div class="panel-body">
        <?php     foreach ($tabProp as $tabP) {
            if($tabP['groupe']==12){
            echo'
          <textarea rows="1" cols="150" style="display:block;">'.$tabP['label_proposition'].'</textarea>
          ';
            }
        }?>
      </div>
    </div>

</div>



  </form>

</div>


	</body>
</html>
