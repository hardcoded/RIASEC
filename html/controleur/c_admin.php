<?php

 require_once('c_auth.php');
  require_once('model/DepartmentModel.php');
  require_once('model/SessionModel.php');
 $authController = new AuthController();
  $depModel = new DepartmentModel();
  $departments = $depModel->getAll();
 include_once('vue/v_admin.php');
?>
