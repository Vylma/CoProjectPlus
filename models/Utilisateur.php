<?php
	class Utilisateur {
	
		public $user_login;
		public $user_password;
		public $user_nom;
		public $user_type;
		public $user_mail;
		public $user_lastconnect;
		
		public function __construct($valeurs = array()) {
			if (!empty($valeurs)) $this->affecte($valeurs);
		}
		
		public function setLogin($user_login) { $this->user_login = $user_login; }
		public function getLogin() { return $this->user_login; }
		public function setPassword($user_password) { $this->user_password = $user_password; }
		public function getPassword() { return $this->user_password; }
		public function setNom($user_nom) { $this->user_nom = $user_nom; }
		public function getNom() { return $this->user_nom; }
		public function setType($user_type) { $this->user_type = $user_type; }
		public function getType() { return $this->user_type; }
		public function setMail($user_mail) { $this->user_mail = $user_mail; }
		public function getMail() { return $this->user_mail; }
		public function setLastconnect($user_lastconnect) { $this->last_connect = $user_lastconnect; }
		public function getLastconnect() { return $this->user_lastconnect; }
		
		public function affecte ($donnees) {
			foreach ($donnees as $attribut => $valeurs) {
				switch ($attribut) {
					case 'user_login' : $this->setLogin($valeurs); break;
					case 'user_password' : $this->setPassword($valeurs); break;
					case 'user_nom' : $this->setNom($valeurs); break;
					case 'user_type' : $this->setType($valeurs); break;
					case 'user_mail' : $this->setMail($valeurs); break;
					case 'user_lastconnect' : $this->setLastconnect($valeurs); break;
				}
			}
		}
	}	
?>