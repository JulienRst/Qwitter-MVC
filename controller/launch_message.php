<?php
	require('../model/database.php');
	$db = new database();
	$qwitt = $db->getQwittFromTS($_POST["object"]["date"]);
	$qwitt->printQwitt();
?>