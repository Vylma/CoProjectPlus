<?php 
class Login extends Controller {
    
    function index() {
    
        $errorMessage = '';
    
        if (!empty($_POST['login']) && !empty($_POST['pwd'])) {
            $this->loadModel('UtilisateurManager');
            
            $login = $_POST['login']; $pwd = $_POST['pwd'];
            if ($this->UtilisateurManager->checkLogin($login, $pwd)) {
                $_SESSION['login'] = $_POST['login'];
                header("location:/projets");
            } else {
                $errorMessage = "<div style=\"color:red; font-size:12px; font-family:verdana;\"><b>Erreur</b><br/>Identifiant ou mot de passe incorrect !<br/></div>";
            }
        }
          
        $d = array();
        $d['errorMessage'] = $errorMessage;
        
        $this->set($d);
        $this->render('index');
    }
}
?>