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

		// $idProfil est l'id de l'utilisateur que l'on regarde
		if(!isset($_GET["idUserToSee"]) || $_GET["idUserToSee"] == null){
			$idProfil = $idUser;
			$profil = $user;
		} else {
			$idProfil = $_GET["idUserToSee"];
			$profil = $db->getCurrentUser($idProfil);
		}	

		if($idProfil != $idUser){
			if($db->isAboTo($idUser,$idProfil)){
				$displayAbo = '<div id="ctn-social-button" rel="'.$profil['id'].'"><button id="social-button" rel="abo"><img class="valid" src="../assets/datas/img/abo.png"><p>Abonné</p></button></div>';
			} else {
				$displayAbo = '<div id="ctn-social-button" rel="'.$profil['id'].'"><button id="social-button" rel="noabo"><p>S\'abonner</p></button></div>';
			}
		} else {
			$displayAbo = '';
		}
		

		//On récupère les qwitts, les favoris et les reqwitts
		$tab_message = $db->getMessageFromUser($idProfil);
		$tab_message = array_merge($tab_message,$db->getFavorisFromUser($idProfil));
		$tab_message = array_merge($tab_message,$db->getReqwittFromUser($idProfil));
		$tab_message = triQwitt($tab_message);

		include('../view/profil.php');
	}
	
?>