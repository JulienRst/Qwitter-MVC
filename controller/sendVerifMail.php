<?php

	session_start();
	require('../model/database.php');

	$db = new database();

	$idUser = $_GET['id'];

	$user = $db->getCurrentUser($idUser);

	sendConfirmMail($user['mail'],$user['verifKey']);

	header('location:viewConnection.php');
	exit();

?>