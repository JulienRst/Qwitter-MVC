<?php

	require('../model/database.php');

	$db = new database();

	session_start();
	$idUser = $_SESSION['idUserConnected'];

	$idAbo = $_GET['idAbo'];

	$db->addFollow($idUser,$idAbo);

	$nbFollow = $db->getNumberOf('abo',$idAbo);

	echo json_encode(array('result' => 'success','nbAbo' => $nbFollow));
?>