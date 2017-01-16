<?php
  require_once('model/PropositionModel.php');

  $propositionModel = new PropositionModel();
  $tabProp = $propositionModel->getAll();
include("vue/v_edit.php");