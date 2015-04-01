<?php
		
	require_once('../model/database.php');

	if(!verifSession()){
		$_SESSION["error"] = "Vous devez être connecté pour accéder à cette page";
		header('location:viewConnection.php');
		exit();
	} else {
		$db = new database();

		$idUser = $_SESSION['idUserConnected'];
		$user = $db->getCurrentUser($idUser);

		$tab_newsfeed = $db->getNewsFeed($idUser);

		include('../view/newsfeed.php');
	}
?>