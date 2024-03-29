<?php

  require_once('c_auth.php');
  require_once('model/ResultModel.php');
  require_once('model/StudentModel.php');
  require_once('model/SessionModel.php');
  $authController = new AuthController();
  $resultModel = new ResultModel();
  $studentModel = new StudentModel();
  $sessionModel = new SessionModel();

  if (!isset($_COOKIE['token'])) {
    header('Location: ./');
  }
  else {
    $data = $authController->decodeToken($_COOKIE['token'])['data'];
    if ($data['role'] != 'student') {
      header('Location: ./?section=admin');
    }
    else {
      $student = $studentModel->getById($data['userID']);
      $results = $resultModel->getByStudent($student['ID_student']);
      $resArray = [$results[0]['percentage'],
                   $results[1]['percentage'],
                   $results[2]['percentage'],
                   $results[3]['percentage'],
                   $results[4]['percentage'],
                   $results[5]['percentage']];

      if ($_GET['type'] == 'code') {
        if ($sessionModel->checkSession($_POST['codeSession'], $student) === true) {
          header('Location: ./?section=qcm');
        }
        else {
          $error = '<div class="alert alert-danger">Code incorrect</div>';
        }
      }
      include_once('vue/v_student.php');
    }
  }
?>
