<nav>
	<div class="nav-ctn-pic">
		<div rel="<?php echo($user["id"]); ?>" style="background-image:url(../assets/datas/profil-pic/<?php echo($user["url_pic"]);?>)" id="nav-pic"></div>
	</div>
	<div class="nav-a">
		<a href="viewNewsFeed.php">Fil d'actualité</a>
	</div>
	<input id="user-finder" value=""/>
	<div id="list-user-finder"></div>
	<div id="ctn-gear" class="nav-ctn-pic">
		<img id="gear" src="../assets/datas/img/gear.png">
		<div id="parameters">
			<div id="setParam" class="param">
				<img src="../assets/datas/img/gear.png">
				<p>Paramètres</p>
			</div>
			<div id="setDeco" class="param">
				<img src="../assets/datas/img/off.png">
				<p>Déconnexion<p>
			</div>
		</div>
	</div>
</nav>