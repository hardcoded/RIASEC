<?php

	require_once('model/PropositionModel.php');

  $propositionModel = new PropositionModel();

  $array = array();
  for ($i = 1; $i <= 12; $i++) {
    $propositions = $propositionModel->getByGroup($i);
    $p = array();
    foreach ($propositions as $prop) {
      // echo $prop['ID_proposition'].' : '.$prop['label_proposition'];
      // echo '<br />';
      $p[] = $prop['label_proposition'];
    }
    $array[$i] = $p;
  }

	require_once('vue/v_qcm.php');
