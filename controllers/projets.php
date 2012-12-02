<?php 
class Projets extends Controller {
    
    function index() {
        $this->render('index');
    }
    
    function get_table() {
        $this->layout = false;
        
        $etat_projet = str_replace('_', ' ', $_POST['etat']);
        $this->loadModel('ProjetManager');
        
        $projets = $this->ProjetManager->getProjetsByType($etat_projet);
        if (!$projets) {
            echo 'Il n\'y a aucun projet '.$etat_projet.'.'; 
        } else {
            $d = array();
            $d['projets'] = $projets;
            $this->set($d);
            
            $this->render('get_table');
        }
      
       
    }
    
    function realisation($id) {
        $this->render('realisation');
    }
    
}
?>