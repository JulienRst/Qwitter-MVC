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
			<header>
				<div id="ctn-profil-pic">
					<div class="profil-pic" style="background-image:url(../assets/datas/profil-pic/<?php echo($profil["url_pic"]);?>);"></div>
				</div>
				<div id="view-info">
					<div id="sub-view-info">
						<div id="sub-view-name" class="sub-view-info"><p><?php echo($profil["surname"]." ".$profil["name"]);?></p></div>
						<div id="sub-view-pseudo" class="sub-view-info"><p>(@<?php echo($profil["pseudo"])?>)</p></div>						
						<div id="sub-view-age" class="sub-view-info"><p><?php echo($profil["birthday"]);?> ans</p></div>
						<div id="ctn-relative">
							<div><p><span id="nbFollow"><?php echo($profil["nbFollow"]);?> Abonnés </span> | <span id="nbAbo"><?php echo($profil["nbAbo"]);?> Abonnements</span></p></div>
						</div>
						<?php echo($displayAbo);?>
						<div id="ctn-number">
							<img id="envelope" src="../assets/datas/img/envelope.png"> 
							<p id="qwitt-count"><?php echo($profil["nbQwitts"]);?> Qwitts</p>
							<img id="favoris" src="../assets/datas/img/favoris.png"> 
							<p><?php echo($profil["nbFavoris"]);?> Favoris</p>
							<img id="retweet" src="../assets/datas/img/retweet.png"> 
							<p><?php echo($profil["nbReqwitts"]);?> Reqwitts</p>
						</div>
					</div>
				</div>
			</header>

			<!--||| /////////////// SECTION \\\\\\\\\\\\\\\ ||| -->

			<section id="ctn-qwitts">
				<div id="post-qwitt">
					<textarea placeholder="Exprimez vous !"></textarea>
					<p>Envoyer >></p>
				</div>
				<div id="qwitt-launcher"></div>
				<?php
					foreach($tab_message as $qwitt){
						$qwitt->printQwitt();
					}
				?>
			</section>
		</div>
		<div class="ctn-popup">
			<div class="ctn-v-center parameter-popup">
				<section class="h-v-center">
					<article class="content">
						<div class="ctn-profil-pic">
							<div id="parameter_pic" class="profil-pic" style="background-image:url(../assets/datas/profil-pic/<?php echo($user["url_pic"]); ?>)"/></div>
							<div class="hover-profil-pic">
								<img class="hover-profil-photo" src="../assets/datas/img/profil-photo.png">
							</div>
						</div>
						<div class="modify">
							<div class="title">Modifier les informations</div>
							<form method=post action="changeProfil.php" enctype="multipart/form-data">
								<div class="form-group">
									<input id="form_mail" type="mail" name="mail" class="form-control" value="<?php echo($user["mail"]);?>" placeholder="adresse e-mail">
								</div>
								<div class="form-group">
									<input type="password" name="password" class="form-control" value=""placeholder="mot de passe">
								</div>
								<div class="form-group">
									<input id="form_surname" type="text" name="surname" class="form-control" value="<?php echo($user["surname"]);?>" placeholder="prénom">
								</div>
								<div class="form-group">
									<input id="form_name" type="text" name="name" class="form-control" value="<?php echo($user["name"]);?>" placeholder="nom">
								</div>
								<div class="form-group">
									<input id="form_pseudo" type="text" name="pseudo" class="form-control" value="<?php echo($user["pseudo"]);?>" placeholder="pseudonyme">
								</div>
								<input id="input_file" type="file" name="url_pic">
								<div class="form-group">
									<button type="submit" class="btn btn-primary">
									 	Enregistrer
									</button>
								</div>
							</form>
							<img class="close" src="../assets/datas/img/black_cross.png">
						</div>
					</article>
				</section>
			</div>
		</div>
		<div class="ctn-reqwitt">
			<div class="ctn-v-center parameter-popup">
			<section class="h-v-center">
				<article class="content">
					<div class="reqwitt-title">Reqwittez ce qwitt !</div>
					<div class="post-qwitt">
						<textarea id="reqwitt-text" placeholder="Exprimez vous !"></textarea>
					</div>
					<div class="qwitt-to-reqwitt">
					</div>
					<div class="rq-ctn-btn">
						<button id="annuler_rq" type="submit" class="btn btn-primary">
						 	Annuler
						</button>
						<button id="reqwitt"type="submit" class="btn btn-primary">
						 	Reqwitter >>
						</button>
				</article>
			</section>
		</div>
		<script type="text/javascript" src="../assets/js/library/jquery.js" title="jquery"></script>
		<script type="text/javascript" src="../assets/js/main_script.js"></script>
	</body>
</html>