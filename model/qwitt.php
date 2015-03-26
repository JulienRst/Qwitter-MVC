<?php
	/*

		L'objet qwitt est en extends database, ce qui veut dire qu'il a accès aux méthodes
		de l'objet database. 

		Cet objet peut contenir au choix un qwitt | reqwitt | favoris

	*/

	class qwitt extends database{
		//On ne peut pas modifier ces valeurs après le __construct, on peut seulement les récupérer (READ ONLY)
		private $idMsg; //id du qwitt
		private $idUser; //id de l'utilisateur qui a qwitté
		private $date; //timestamp du qwitt
		private $message; //message en cas d'un qwitt | qwitt reqwitté ou favoris 
		private $nbReQwitt; //Nombre de reqwitt sur le message
		private $nbFav; //Nombre de fav sur le message
		private $user; //tableau d'information sur l'utilisateur
		protected $pdo; //Objet pdo que l'on récupère à la création 
		private $type; //Type de qwitt : normal | reqwitt | favoris
		private $reqwitt_message; //Message dans le reqwitt 

		/* ---
		
			Entrée : tableau de l'objet, objet pdo, type du qwitt
			Sortie : #
			Action : En fonction du type de l'objet on récupère les infos nécessaires à 
			la création de l'objet qwitt

		--- */

		public function __construct($qwitt,$pdo,$type='normal'){
			$this->idMsg = $qwitt["id"];
			$this->idUser = $qwitt["idUser"];
			$this->date = timestampToDate($qwitt["date"]);
			$this->pdo = $pdo;
			$this->type = $type;

			if($type == 'normal'){
				$this->nbReQwitt = $this->getCaracOfMessage($this->idMsg,"reqwitt");
				$this->nbFav = $this->getCaracOfMessage($this->idMsg,"favoris");
				$this->message = $qwitt["message"];
			} else if($type == 'favoris'){
				$idMessageFav = $qwitt['idMessage'];
				//On met un qwitt dans un qwitt pour récupérer les infos du message mis en favoris
				$this->message = new qwitt($this->getMessageFromId($idMessageFav),$this->pdo);
				$this->user = $this->getCurrentUser($this->message->getIdUser());
			} else if($type == "reqwitt"){
				$idMessageRq = $qwitt['idMessage'];
				$this->message = new qwitt($this->getMessageFromId($idMessageRq),$this->pdo);
				$this->user = $this->getCurrentUser($this->message->getIdUser());
				$this->reqwitt_message = $qwitt["message"];
			}
		}

		//Methode get
		public function getIdMsg(){return $this->idMsg;}
		public function getIdUser(){return $this->idUser;}
		public function getDate(){return $this->date;}
		public function getMessage(){return $this->message;}
		public function getNbReQwitt(){return $this->nbReQwitt;}
		public function getNbFav(){return $this->nbFav;}
		public function getType(){return $this->type;}
		public function getUser(){return $this->user;}
		public function getReqwittMessage(){return $this->reqwitt_message;}

		/* ---
		
			Entrée : id du message / ce que l'on recherche
			Sortie : Le nombre de reqwitt | favoris
			Action : On va chercher dans la bdd le nombre de reqwitt ou de favoris 
			qui ont été fait avec le message donné (enfin l'id) en entrée

		--- */

		private function getCaracOfMessage($idMsg,$type){
			if($type == "reqwitt" || $type == "favoris"){
				//Recuperer le nombre de reqwitt et de favoris
				$stmt = $this->pdo->prepare("SELECT count(*) FROM $type WHERE idMessage = :idMsg");
				$stmt->bindParam(':idMsg',$idMsg);
				$stmt->execute();
				$stmt = $stmt->fetch();
				return $stmt[0];
			}
		}

		public function printQwitt(){
			if($this->getType() == 'normal'){
				//Info du posteur du Qwitt
				$user = $this->getCurrentUser($this->getIdUser());
				$user_pic = $user["url_pic"];
				$user_name = $user["surname"].' '.$user["name"];
				//Info du Qwitt en lui même
				$date = $this->getDate();
				$message = $this->getMessage();
				$nbFav = $this->getNbFav();
				$nbReq = $this->getNbReQwitt();
				$id = $this->getIdMsg();
				include("../controller/normal_qwitt.php");
			} else if($this->getType() == 'favoris'){
				//Info de la mise en favoris
				$date = $this->getDate();
				$user = $this->getCurrentUser($this->getIdUser());
				$user_pic = $user["url_pic"];
				$user_name = $user["surname"].' '.$user["name"];
				//Information du Qwitt mis en favoris
					//Info du posteur du Qwitt
				$fUser = $this->getUser();
				$favoris_pic = $fUser['url_pic'];
				$favoris_name = $fUser['surname'].' '.$fUser['name'];
					//Info du Qwitt en lui même
				$favoris = $this->getMessage();
				$favoris_date = $favoris->getDate();
				$favoris_message = $favoris->getMessage();
				$nbFav = $favoris->getNbFav(); 
				$nbReq = $favoris->getNbReQwitt();
				$id = $favoris->getIdMsg();
				include("../controller/favoris_qwitt.php");
			} else if($this->getType() == 'reqwitt'){
				//Info de la mise en reqwitt
					//Info de l'user qui reqwitt
					$user = $this->getCurrentUser($this->getIdUser());
					$user_pic = $user["url_pic"];
					$user_name = $user["surname"].' '.$user["name"];
					//Info du reqwitt
					$date = $this->getDate();
					$reqwitt_ofmessage = $this->getReqwittMessage();
				//Info du qwitt reqwitté
					//Info du posteur du Qwitt
				$rUser = $this->getUser();
				$reqwitt_pic = $rUser['url_pic'];
				$reqwitt_name = $rUser['surname'].' '.$rUser['name'];
					//Info du Qwitt en lui même
				$reqwitt = $this->getMessage();
				$reqwitt_date = $reqwitt->getDate();
				$reqwitt_message = $reqwitt->getMessage();
				$nbFav = $reqwitt->getNbFav(); 
				$nbReq = $reqwitt->getNbReQwitt();
				$id = $reqwitt->getIdMsg();
				
				include("../controller/reqwitt_qwitt.php");
			}
		}
	}
?>