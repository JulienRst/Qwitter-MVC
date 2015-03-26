<?php

	session_start();
	if(isset($_SESSION["error"])){
		if($_SESSION["error"] == NULL){
			$error = false;
		} else {
			$error = $_SESSION["error"];
			$_SESSION["error"] = NULL;
		}
	} else {
		$error = false;
	}

	include('../view/registration.php');
?>