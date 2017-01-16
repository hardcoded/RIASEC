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
    $admin = $adminModel->getById($data['ID_admin']);
    $departments = $depModel->getAll();
  	$sessions = $sessionModel->getAll();
  	$promos= $promModel->getAll();
  	$tabSession = NULL;

    if ($_GET['type'] == 'code') {
      $promo = array('department' => $_POST['section'],
                     'year' => $_POST['annee'],
                     'graduation' => $_POST['graduation']);

      $checkProm = $promModel->checkProm($promo);
      if ($checkProm === false) {
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
      $sessionModel->createSession($session);
    }
    include_once('vue/v_admin.php');
  }
?>
