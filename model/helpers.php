<?php
	//convertir une date en un age
	function getAge($date){
		$birthDate = $date;
		$birthDate = explode("-", $birthDate);
		$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[2], $birthDate[0]))) > date("md") ? ((date("Y") - $birthDate[0]) - 1) : (date("Y") - $birthDate[0]));
		return $age;
	}

	//convertit un timestamp en une date affichable
	function timestampToDate($timestamp){
		$date = "le ".date("d/m/y \à H\hi", $timestamp);
		return $date;
	}

	//password_hash - password verify sont présent dans la librairi ircmaxell
	function cryptmdp($mdp){
		$mdp = password_hash($mdp,PASSWORD_BCRYPT);
		return $mdp;
	}

	function testmdp($mdp,$db_mdp){
		if(password_verify($mdp,$db_mdp)){
			return true;
		} else {
			return false;
		}
	}

	//Envoie d'un mail avec la clef et le mail en get dans l'url pour vérifier un utilisateur
	function sendConfirmMail($mail,$key){
		$to      = $mail;
		$subject = 'Validez votre inscription sur Qwitter !';
		$message = 'Bonjour à toi Qwitterien afin de vérifier les informations que tu nous as donné il te suffit de cliquer sur le lien dans le mail !';
		$message.= 'Voici le lien : http://www.julien-rousset.fr/qwitter/php/user_verify.php?key='.$key.'&mail='.$mail;
		$headers = 'MIME-Version: 1.0';
   		mail($to, $subject, $message, $headers);
	}

	function verifSession(){
		if(!isset($_SESSION)){
			session_start();
		}
		// Vérifie que l'utilisateur est connecté
		if(!$_SESSION || $_SESSION['connected'] == false){
			return false;
		} else {
			return true;
		}
	}

	function triQwitt($tab_message){
		function compare($a,$b){
			// Les dates apparaissent dans l'ordre decroissant
			return (-strcmp($a->getDate(),$b->getDate()));
		}
		//tri
		usort($tab_message,'compare');
		return $tab_message;
	}
?>