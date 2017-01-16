<?php
	require_once('c_auth.php');
	require_once('model/DepartmentModel.php');
	require_once('model/SessionModel.php');
	require_once('model/PromModel.php');
	$authController = new AuthController();
 	$depModel = new DepartmentModel();
 	$sessionModel = new SessionModel();
 	$promModel = new PromModel();

	$departments = $depModel->getAll();
	
	$sessions = $sessionModel->getAll();
	$promos= $promModel->getAll();

	$tabSession = NULL;

 include_once('vue/v_admin.php');
?>
