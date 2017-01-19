<?php
	require_once('c_auth.php');
  require_once('model/PromModel.php');
  require_once('model/AdminModel.php');
  require_once('model/DepartmentModel.php');
  require_once('model/StudentModel.php');
  require_once('model/SessionModel.php');
  $authController = new AuthController();
  $adminModel = new AdminModel();
  $promModel = new PromModel();
  $depModel = new DepartmentModel();
  $sessionModel = new SessionModel();

  if (!isset($_COOKIE['token'])) {
    header('Location: ./');
  }
  else {
    $data = $authController->decodeToken($_COOKIE['token'])['data'];
    $admin = $adminModel->getById($data['adminID']);
    $departments = $depModel->getAll();
  	$sessions = $sessionModel->getAll();
  	$promos= $promModel->getAll();

    // Resultat de la requete que tu m'as demandé Tristan
    $tabSession = $sessionModel->getSessionDepartment();

    if ($_GET['type'] == 'code') {
      $promo = array('department' => $_POST['section'],
                     'year' => $_POST['annee'],
                     'graduation' => $_POST['graduation']);

      $checkProm = $promModel->checkProm($promo);
      if ($checkProm == -1) {
        $newProm = $promModel->createProm($promo);
        $session = array('code' => $_POST['codeSession'],
                         'date' => date('Y-m-d'),
                         'prom' => $newProm);
      }
      else {
        $session = array('code' => $_POST['codeSession'],
                         'date' => date('Y-m-d'),
                         'prom' => $checkProm);
      }
      foreach ($sessions as $s) {
        if (($session['code'] == $s['code']) && ($session['prom'] == $s['prom'])) {
          $exists = true;
          break;
        }
        else {
          $exists = false;
        }
      }
      if ($exists) {
        $error = '<div class="alert alert-warning">Le code <stong>'.$session['code'].'</stong> existe déjà pour cette promo !</div>';
      }
      else {
        if ($sessionModel->createSession($session)) {
          $succes = '<div class="alert alert-success">La session <stong>'.$session['code'].'</stong> a été créée avec succès !</div>';
        }
        else {
          $error = '<div class="alert alert-danger">Erreur lors de la création de la session <stong>'.$session['code'].'</stong> !</div>';
        }
      }
      header('Refresh: 2, url=./?section=admin');
    }
    include_once('vue/v_admin.php');
  }
?>
