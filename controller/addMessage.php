<?php
	require('../model/database.php');
	$db = new database();

	session_start();

	$idUser = $_SESSION['idUserConnected'];
	$idWall = $_SESSION['idWall'];

	$message = $_GET['message'];
	if(preg_match('/[^ ]/',$message)){
		$date = new DateTime(); // recupère l'heure
		$timestamp = $date->getTimestamp(); //transforme l'heure en timestamp

		$result = $db->addMessage($idUser,$idWall,$timestamp,$message);

		$nbQwitt = $db->getNumberOf("qwitt",$idUser);//recalcul le nombre de qwitt posté

		$resp = array('success' => true,'message' => $message,'idWall' => $idWall,'date' => $timestamp,'nbQwitt' => $nbQwitt);
		header('Content-type: text/javascript');
		echo json_encode($resp);
	} else {
		$resp = array('sucess' => false,'message' => "Message vide");
		echo json_encode($resp);
	}
?>