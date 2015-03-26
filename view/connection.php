<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><!-- Trouver le moyen de le faire en htaccess -->
		<title>Qwitter | Connexion</title>
		<link rel="stylesheet" type="text/css" href="../assets/css/material/material.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/material/ripples.min.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/main_style.css">
	</head>
	<body>
		<div class="ctn-v-center">
			<section class="h-v-center">
				<article class="content">
					<div class="ctn_form">
						<h2>Connexion à Qwitter</h2>
						<p>Twitter, en moins bien</p>
						<form class="form-horizontal" method="get" action="../controller/connection.php">
							<div class="form-group">
								<input type="mail" name="mail" class="form-control" placeholder="adresse e-mail">
							</div>
							<div class="form-group">
								<input type="password" name="password" class="form-control" placeholder="mot de passe">
							</div>
							<div class="form-group">
								<span class="input-group-btn">
									 <button type="submit" class="btn btn-primary">
									 	Connexion
									 </button>
								</span>
							</div>
						</form>
						<p id="register">Pas encore inscrit ? <a href="../controller/viewRegistration.php">S'incrire à Qwitter >></a></p>
					</div>
					<div id="ctn_ci_logo">
						<img src="../assets/datas/img/logo.png" title="Logo Qweeter"></div>
					</div>
				</article>
			</section>
		</div>
		<?php
			if($error){
				echo('
					<div id="error_message" class="alert alert-danger alert-dismissible" role="alert">
		  				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  				<strong>Attention ! </strong>'.$error.'
					</div>
				');
			}
		?>
		<script type="text/javascript" src="../assets/js/library/jquery.js" title="jquery"></script>
		<script type="text/javascript" src="../assets/js/library/bootstrap.js" title="jquery"></script>
		<script type="text/javascript" src="../assets/js/library/material.min.js" title="material"></script>
		<script type="text/javascript" src="../assets/js/library/ripples.min.js" title="ripples"></script>
		<script type="text/javascript" src="../assets/js/main_script.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){$.material.init();});
		</script>
	</body>
</html>