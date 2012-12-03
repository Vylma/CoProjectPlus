<?php
require(ROOT."models/Projet.php");

class ProjetManager extends Model {
	
	public function getProjetsByType($etat_projet) {
		$listeProjets = array();
		$requete = $this->db->prepare('select id_projet as code, nom, libelle as etat, priorite from sdsi_projet 
									   inner join sdsi_etat_projet on sdsi_projet.id_etat_projet = sdsi_etat_projet.id_etat_projet
                                       where libelle = :etat_projet;');
        $requete->bindValue(':etat_projet', $etat_projet);
									   
		$requete->execute();
		while ( $projet = $requete->fetch(PDO::FETCH_ASSOC))
		{
			$listeProjets[] = new Projet($projet); 
		}
			
		$requete->closeCursor();
		return $listeProjets;
	}
	
	public function getPartielProjets($login) {
		$listeProjets = array();
		$requete = $this->db->prepare('select sdsi_projet.id_projet as code, nom, libelle as etat, priorite from sdsi_projet 
									   inner join sdsi_etat_projet on sdsi_projet.id_etat_projet = sdsi_etat_projet.id_etat_projet
									   inner join sdsi_acteur_projet on sdsi_projet.id_projet = sdsi_acteur_projet.id_projet
									   where user_login = :login;');
									   
		$requete->bindValue(':login', $login);
									   
		$requete->execute();
		while ( $projet = $requete->fetch(PDO::FETCH_ASSOC))
		{
			$listeProjets[] = new Projet($projet); 
		}
			
		$requete->closeCursor();
		return $listeProjets;
	}
    
    public function getProjetById($id_projet) {
        $requete = $this->db->prepare('select sdsi_projet.id_projet as code, nom, libelle as etat, priorite from sdsi_projet 
									   inner join sdsi_etat_projet on sdsi_projet.id_etat_projet = sdsi_etat_projet.id_etat_projet
									   inner join sdsi_acteur_projet on sdsi_projet.id_projet = sdsi_acteur_projet.id_projet
									   where sdsi_projet.id_projet = :id_projet;');
                                       
                                       
        $requete->bindValue(':id_projet', $id_projet);
        $requete->execute();
        
        $pro = $requete->fetch();
        $projet = new Projet($pro);
        
        
        $requete->closeCursor();
        return $projet;
    }
}
	
	
?>