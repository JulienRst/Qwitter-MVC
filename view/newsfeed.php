<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Qwitter | Profil</title>
		<link rel="stylesheet" type="text/css" href="../assets/css/main_style.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/material/material.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/material/ripples.min.css">
	</head>
	<body>
		<div id="wrap">
			<?php include('../view/nav.php'); ?>
			<section id="ctn-qwitts" class="newsfeed">
				<?php
					foreach($tab_newsfeed as $qwitt){
						$qwitt->printQwitt();
					}
				?>
			</section>
		</div>
		<script type="text/javascript" src="../assets/js/library/jquery.js" title="jquery"></script>
		<script type="text/javascript" src="../assets/js/main_script.js"></script>
	</body>
</html>