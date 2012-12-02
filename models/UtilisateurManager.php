<?php
require(ROOT."models/Utilisateur.php");

class UtilisateurManager extends Model {
	
	public function getAllUtilisateurs() {
		$listeUtilisateurs = array();
		$requete = $this->db->prepare('select user_login, user_password, user_nom, libelle as user_type, user_mail, user_lastconnect 
									   from sdsi_utilisateur inner join sdsi_type_utilisateur on sdsi_utilisateur.id_type_utilisateur = sdsi_type_utilisateur.id_type_utilisateur
									   order by user_login asc;');
		$requete->execute();
		while ( $utilisateur = $requete->fetch(PDO::FETCH_ASSOC))
		{
			$listeUtilisateurs[] = new Utilisateur($utilisateur); 
		}
			
		$requete->closeCursor();
		return $listeUtilisateurs;

	}
	
	public function checkLogin($login, $pwd) {
		
		$requete = $this->db->prepare('select * from sdsi_utilisateur where user_login = :login and user_password = :pwd;');
		
		$requete->bindValue(':login', $login);
		$requete->bindValue(':pwd', md5($pwd));
		
		$requete->execute();
		
		$count = $requete->rowCount();
		$requete->closeCursor();
		
		if ($count != 0) { return true; }
		else { return false; }
	}
	
}
	
	
?>