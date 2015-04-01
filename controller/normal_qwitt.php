<?php
	echo('
	<div class="qwitt normal">
		<div class="qwitt-header">
			<div class="q-header-pic">
				<div style="background-image:url(../assets/datas/profil-pic/'.$user_pic.');"></div>
			</div>
			<div class="q-header-view">
				<p class="q-header-view-name"><a class="first" href="viewProfil.php?idUserToSee='.$id_posteur.'">'.$user_name.'</a>'.$wall_name.'</p>
				<p class="q-header-view-date">'.$date.'</p>

			</div>
			<div class="q-header-icon" rel="'.$id.'">
				<div class="icon-reqwitt"></div>
				<div class="icon-fav"></div>							
			</div>
		</div>
		<div class="qwitt-message">
			<p>
				'.$message.'
			</p>
		</div>
		<div class="qwitt-footer">
			<img src="../assets/datas/img/star.png">
			<p>'.$nbFav.' favoris</p>
			<img src="../assets/datas/img/small_reqwitt.png">
			<p>'.$nbReq.' reqwitts</p>
		</div>
	</div>
	');
?>