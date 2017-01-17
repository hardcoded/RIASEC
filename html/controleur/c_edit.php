<?php
  require_once('model/PropositionModel.php');

  $propositionModel = new PropositionModel();
  $tabProp = $propositionModel->getAll();

  if ($_GET['type'] == 'store') {
    $props = $_POST;
    foreach ($props as $prop) {
      switch ($prop) {
        case "A":
          $propositionModel->editLabel($prop, $props['group'], $props['propositionA']);
          break;
        case "B" :
          $propositionModel->editLabel($prop, $props['group'], $props['propositionB']);
          break;
        case "C":
          $propositionModel->editLabel($prop, $props['group'], $props['propositionC']);
          break;
        case "D":
          $propositionModel->editLabel($prop, $props['group'], $props['propositionD']);
          break;
        case "E":
          $propositionModel->editLabel($prop, $props['group'], $props['propositionE']);
          break;
        case "F":
          $propositionModel->editLabel($prop, $props['group'], $props['propositionF']);
          break;
        default:
          break;
      }
    }
    header('Refresh: 1, url=./?section=admin');
  }
include("vue/v_edit.php");
