<?php
	class Projet {
	
		public $code;
		public $nom;
		public $etat;
		public $priorite;
		
		public function __construct($valeurs = array()) {
			if (!empty($valeurs)) $this->affecte($valeurs);
		}
		
		public function setCode($code) { $this->code = $code; }
		public function getCode() { return $this->code; }
		public function setNom($nom) { $this->nom = $nom; }
		public function getNom() { return $this->nom; }
		public function setEtat($etat) { $this->etat = $etat; }
		public function getEtat() { return $this->etat; }
		public function setPriorite($priorite) { $this->priorite = $priorite; }
		public function getPriorite() { return $this->priorite; }
		
		public function affecte ($donnees) {
			foreach ($donnees as $attribut => $valeurs) {
				switch ($attribut) {
					case 'code' : $this->setCode($valeurs); break;
					case 'nom' : $this->setNom($valeurs); break;
					case 'etat' : $this->setEtat($valeurs); break;
					case 'priorite' : $this->setPriorite($valeurs); break;
				}
			}
		}
	}	
?>