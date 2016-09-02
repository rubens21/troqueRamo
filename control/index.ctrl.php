<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	require '../class/GitRepo.class.php';

	$devel = $_POST['devel'];
	$path = "/var/www/TEST/{$devel}/buscafacil";
	$Repo = new GitRepo($path);

	if(method_exists($Repo,$_POST['action'])){
		$param = isset($_POST['param'])?$_POST['param']:null;
		$response = $Repo->$_POST['action']($param);
	}

	exit(json_encode($response));


