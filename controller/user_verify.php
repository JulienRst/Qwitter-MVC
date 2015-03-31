<?php
	session_start();
	require('../model/database.php');

	$key = $_GET['key'];
	$mail = $_GET['mail'];

	$db = new database();

	$result = $db->verifyUser($mail,$key);

	if($result["success"] == true){
		$_SESSION["error"] = "Validation accepté !";
	} else {
		$_SESSION["error"] = $result["error"];
	}
	header('location:../controller/connection.php');
?>